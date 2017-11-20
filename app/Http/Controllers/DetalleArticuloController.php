<?php

namespace sisVentas\Http\Controllers;

use Illuminate\Http\Request;
use sisVentas\Http\Requests;
use sisVentas\DetalleArticulo;
use Illuminate\Support\Facades\Redirect;
use sisVentas\Http\Requests\DetalleArticuloFormRequest;
use DB;
use Alert;
use Auth;
use Session;
use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;
class DetalleArticuloController extends Controller
{
  public function __construct()
  {
     $this->middleware('auth');
  }
  public function index(Request $request)
  {
         //toda la data lo enviamos desde articulocontroller, ya q esto se carga desde un modal...

  }
  public function create()
  {
      return view("almacen.articulo.plus");
  }
  public function store (DetalleArticuloFormRequest $request)
  {
      $detalle=new DetalleArticulo;
      $detalle->idarticulo=$request->get('idarticulo');
      $detalle->color=$request->get('_color');
      //codigo ver si es autogenerado o no
      $check=$request->get('codigo_ck');
      if($check=='1'){
        //autogenerado
        $sub=$request->get('subcategoria');
        $mat=$request->get('material');
        $tip=$request->get('tipo');
        $p1=substr($sub,0,1);
        $p1=strtoupper($p1);
        $p2=substr($mat,0,1);
        $p2=strtoupper($p2);
        $p3=substr($tip,0,1);
        $p3=strtoupper($p3);
        $number=DB::table('detalle_articulo')
        ->select(DB::raw('MAX(iddetalle_articulo)+1 as g'))->get();
        foreach ($number as $key ) {
          $keynew=$key->g;
        }
        $alice0=$keynew;
        //$alice=strlen($alice0);
        //Con ello concatenamos de 4
        $cod_concat=$p1.$p2.$p3.$alice0;
        $detalle->codigo=$cod_concat;
        }else{
          //simplemente extraemos del input :v SCANDAL YESS mucho anime :D
          $detalle->codigo=$request->get('codigo_ok');
        }
      //seguimos con el tamaño
        $detalle->tam_tx=$request->get('tama_tx');
        $tam=$request->get('tama_tx');
        if($tam=='Ancho/Largo'){
          $detalle->tam_nro1=$request->get('tam_nro1');
          $detalle->tam_nro2=$request->get('tam_nro2');
          $detalle->UN1=$request->get('UN1');
          $detalle->UN2=$request->get('UN2');
        }else if($tam=='Numero/Peso'){
          $detalle->tam_nro1=$request->get('tam_nro3');
          $detalle->tam_nro2=$request->get('tam_nro4');
          $detalle->UN1=$request->get('UN3');
          $detalle->UN2=$request->get('UN4');
        }else{
          $detalle->tam_nro1='0';
          $detalle->tam_nro2='0';
          $detalle->UN1='-';
          $detalle->UN2='-';
        }
          $detalle->num_stock_gn=$request->get('stock_gn');
          $detalle->medida_stock_gn=$request->get('stock_med');
          //verificando si hay stock detallado
          $verificar=$request->get('stock_det_tx');
          if ($verificar=='-'){
              //entonces no hay
              $detalle->medida_stock_det='-';
              $detalle->num_stock_det='0';
              $detalle->precio_det_u='0';

          }else{
              $detalle->medida_stock_det=$request->get('stock_det_tx');
              $detalle->num_stock_det=$request->get('stock_det');
              $detalle->precio_det_u=$request->get('PVD');
          }
          $detalle->stockmin=$request->get('stock_min');
          $detalle->etiqueta=$request->get('etiqueta');
          $detalle->precio_normal_u=$request->get('PVU');

          $detalle->cantidad_vol1=$request->get('CANT_V1');
          $detalle->precio_vol1=$request->get('CANT_PV1');
          $detalle->cantidad_vol2=$request->get('CANT_V2');
          $detalle->precio_vol2=$request->get('CANT_PV2');
          $detalle->cantidad_vol3=$request->get('CANT_V3');
          $detalle->precio_vol3=$request->get('CANT_PV3');
          $detalle->estado='Activo';

      $detalle->save();

      //INGRESAMOS MOVIMIENTO
         $sucursal_a=Auth::user()->id_s;
         $mytime3 = Carbon::now('America/Lima');
                 DB::table('movimiento')->insert(
                 ['idarticulo' => $detalle->iddetalle_articulo, 'tipo_movimiento' => 'Entrada' ,'motivo' => 'Inventario Inicial', 'cantidad' =>  $detalle->num_stock_gn, 'estado' => 'Activo' , 'fecha_mov' => $mytime3->toDateTimeString(),'idsucursal' =>$sucursal_a,'nota'=>'-']);

      Alert::success('El detalle se registro correctamente', 'Mensaje del Sistema')->persistent("Close");
      return Redirect::to('almacen/articulo');

  }

}
