<?php

namespace sisVentas\Http\Controllers;

use Illuminate\Http\Request;
use sisVentas\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sisVentas\Http\Requests\Articulo2FormRequest; //validamos traslado
use sisVentas\Articulo2;
use DB;
use Auth;
use Session;
use Alert;
use Fpdf;
use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;


class ArticuloController2 extends Controller
{
      public function __construct()
    {
        $this->middleware('auth');
    }
     public function byArticulos($id){
       $result=DB::table('detalle_articulo as da')
       ->where('da.iddetalle_articulo','=',$id)
       ->get();
       return $result;
     }
     public function index(Request $request)
    {
         $sucursal=Auth::user()->id_s;
         $tipom=DB::table('tipo_movimiento as tm')
            ->select('tm.idtipo_movimiento','tm.nombre','tm.tipo_mov')
            ->get();

                $articulos=DB::table('traslado as t')
                ->join('detalle_articulo as da','da.iddetalle_articulo','=','t.idarticulo')
                ->join('articulo as a','a.idarticulo','=','da.idarticulo')
                ->join('categoria as c','a.idcategoria','=','c.idcategoria')
                ->select('a.idarticulo','a.nombre','c.nombre as categoria','a.imagen','a.estado','a.tipo','a.material','a.descripcion','a.etiqueta','a.subcategoria','t.idtraslado')
                ->where('t.idsucursal','=',$sucursal)
                ->groupBy('a.idarticulo')
                ->get();

              $listado= DB::table('detalle_articulo as da')
              ->join('articulo as art','art.idarticulo','=','da.idarticulo')
                ->select(DB::raw('CONCAT(da.codigo, " ",art.nombre, " color ",da.etiqueta) AS articulo'),'da.iddetalle_articulo','da.UN1','da.UN2','da.tam_nro1','da.tam_nro2')
              ->whereNotIn('da.iddetalle_articulo', function($query)
              {
                  $sucursal=Auth::user()->id_s;
                  $query->select('idarticulo')
                        ->from('traslado')
                        ->where('idsucursal','=',$sucursal);
              })
              ->get();
            return view('traslados.articulos.index',["listado"=>$listado,"articulos"=>$articulos,"tipom"=>$tipom]);


    }




     public function show($id)
    {
        //donde el id, es de idarticulo
         $sucursal=Auth::user()->id_s;
        $detalles=DB::table('detalle_articulo as da')
        ->join('traslado as t','da.iddetalle_articulo','=','t.idarticulo')
        ->select('t.idtraslado','t.stock','t.estado','t.stockmin','t.cantidad_detalle','t.precio_detalle','t.precio_venta','t.cantidad_volumen1','t.cantidad_volumen2','t.cantidad_volumen3','t.precio_mayor1','t.precio_mayor2','da.medida_stock_det','t.precio_mayor3','da.codigo','da.imagen','da.UN1','da.UN2','da.color','da.etiqueta','da.tam_tx','da.tam_nro1','da.tam_nro2','da.medida_stock_gn','da.iddetalle_articulo')
        ->where('da.idarticulo','=',$id)
        ->where('t.idsucursal','=',$sucursal)
        ->get();

            //esto es para el nombre q se muestra en el show, lo cual enviaremos concatenado a edit :v
        $tipos=DB::table('tipo_movimiento')->get();
        $articulo_nom=DB::table('articulo as a')
           ->select('a.nombre')
           ->where('a.idarticulo','=',$id)
           ->get();

        return view("traslados.articulos.show",["detalles"=>$detalles,"articulo_nom"=>$articulo_nom,"tipos"=>$tipos]);

    }

    public function edit($id)
    {
        return view("traslados.articulos.edit",["articulo"=>Articulo2::findOrFail($id)]);
    }
    public function update(Articulo2FormRequest $request,$id)
    {
        $articulo=Articulo2::findOrFail($id);
        $articulo->stock=$request->get('val_stock');
        $articulo->cantidad_volumen1=$request->get('vol_1');
        $articulo->cantidad_volumen2=$request->get('vol_2');
        $articulo->cantidad_volumen3=$request->get('vol_3');
        $articulo->precio_mayor1=$request->get('pre_1');
        $articulo->precio_mayor2=$request->get('pre_2');
        $articulo->precio_mayor3=$request->get('pre_3');
        $articulo->precio_venta=$request->get('val_uni');
        $articulo->stockmin=$request->get('st_min');
        $articulo->estado=$request->get('estado');;
        $precio_det=$request->get('vd_num');
        if($precio_det==''){
          $articulo->precio_detalle=0;
          $articulo->cantidad_detalle=0;
        }else{
          $articulo->precio_detalle=$request->get('vd_num');
          $articulo->cantidad_detalle=$request->get('st_det');
        }
        $articulo->update();
        Alert::success('El articulo se actualizo correctamente', 'Mensaje del Sistema')->persistent("Close");
        return Redirect::to('traslados/articulos');
    }

       public function destroy($id)
    {

    }

    public function create()
    {
           return view("traslados.articulos.create");

    }

  public function store(Articulo2FormRequest $request){
    $mytime = Carbon::now('America/Lima');
    $sucursal=Auth::user()->id_s;
    $articulo=new Articulo2;
    $articulo->idarticulo=$request->get('idarticulo');
    $articulo->stock=$request->get('val_stock');
    $articulo->cantidad_volumen1=$request->get('vol_1');
    $articulo->cantidad_volumen2=$request->get('vol_2');
    $articulo->cantidad_volumen3=$request->get('vol_3');
    $articulo->precio_mayor1=$request->get('pre_1');
    $articulo->precio_mayor2=$request->get('pre_2');
    $articulo->precio_mayor3=$request->get('pre_3');
    $articulo->precio_venta=$request->get('val_uni');
    $articulo->stockmin=$request->get('st_min');
    $articulo->fecha_hora=$mytime->toDateTimeString();
    $articulo->idsucursal=$sucursal;
    $articulo->estado='Activo'; //si solo si ha sido desactivado si es asi pordra activarlo
    $precio_det=$request->get('vd_num');
    if($precio_det==''){
      $articulo->precio_detalle=0;
      $articulo->cantidad_detalle=0;
    }else{
      $articulo->precio_detalle=$request->get('vd_num');
      $articulo->cantidad_detalle=$request->get('st_det');
    }
    $articulo->save();
    //INGRESAMOS MOVIMIENTO

      DB::table('movimiento')->insert(
      ['idarticulo' => $articulo->idarticulo, 'tipo_movimiento' => 'Entrada' ,'motivo' => 'Inventario Inicial', 'cantidad' =>  $articulo->stock, 'estado' => 'Activo' , 'fecha_mov' => $mytime->toDateTimeString(),'idsucursal' =>$sucursal,'nota'=>'-']);

    Alert::success('El Articulo se registro correctamente', 'Mensaje del Sistema')->persistent("Close");
    return Redirect::to('traslados/articulos');
  }

}
