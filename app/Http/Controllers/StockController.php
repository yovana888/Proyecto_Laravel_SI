<?php

namespace sisVentas\Http\Controllers;


use Illuminate\Http\Request;
use sisVentas\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sisVentas\Http\Requests\StockFormRequest;
use sisVentas\Http\Requests\NotificacionTraFormRequest;
use sisVentas\Notificacion_Traslado;
use sisVentas\DetalleNotTraslado;
use DB;
use Fpdf;
use \PDF;
use DomPdf;
use Auth;
use Alert;

use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;




class StockController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {

        if ($request)
        {


            $query=trim($request->get('searchText'));

            $idsucursal=Auth::user()->id_s;
            $sucursal=Auth::user()->s_actual;

            $sucursales=DB::table('sucursal')->get();

            if($sucursal=='Almacen-Central'){
                  $articulos=DB::table('articulo as a')
                  ->select('a.idarticulo','a.stock','a.precio_venta','a.estado','a.stockmin','a.precio_mayor','a.cantidad_volumen','a.nombre','a.codigo',DB::raw('SUM(a.stockmin-a.stock) as resta'),DB::raw('CONCAT(a.codigo, " ",a.nombre) AS articulo'))
                  ->where('a.estado','=','Activo')
                  ->where(function ($q)  use ($query){
                    $q->where('a.nombre','LIKE','%'.$query.'%');
                    $q->orWhere('a.codigo','LIKE','%'.$query.'%');
                  })
                ->orderBy('a.idarticulo','desc')
                ->groupBy('a.idarticulo')
                ->havingRaw('SUM(a.stockmin-a.stock) >= 0')
                ->paginate(7);

                    $misucursal=DB::table('articulo as ar')
                    ->select(DB::raw('CONCAT(ar.codigo, " ",ar.nombre) AS nombrecompleto'),'ar.idarticulo')
                    ->get();

            }else{

                //ES PORQUE ESTOY EN SUCURSAL

                 $articulos=DB::table('traslado as t')
                ->join('articulo as a','a.idarticulo','=','t.idarticulo')
                ->select('t.idtraslado','t.idarticulo',DB::raw('CONCAT(a.codigo, " ",a.nombre) AS articulo'),'t.stock','t.idsucursal','t.estado','t.stockmin','t.precio_mayor','t.cantidad_volumen','t.precio_venta','a.nombre','a.codigo',DB::raw('SUM(t.stockmin-t.stock) as resta'))
                ->where('t.idsucursal','=',$idsucursal)
                ->where('t.estado','=','Activo')
                ->where(function ($q)  use ($query){
                    $q->where('a.nombre','LIKE','%'.$query.'%');
                    $q->orWhere('a.codigo','LIKE','%'.$query.'%');
                  })
                ->orderBy('t.idtraslado','desc')
                ->groupBy('t.idtraslado')
                ->havingRaw('SUM(t.stockmin-t.stock) >= 0')
                ->paginate(7);

                   $misucursal=DB::table('traslado as t')
                    ->join('articulo as art','art.idarticulo','=','t.idarticulo')
                    ->select(DB::raw('CONCAT(art.codigo, " ",art.nombre) AS nombrecompleto'),'t.idarticulo','t.stock','t.idtraslado')
                    ->where('t.idsucursal','=',$idsucursal)
                    ->get();


            }


           return view('traslados.stock.index',["articulos"=>$articulos,"searchText"=>$query, "sucursales" =>$sucursales,"misucursal"=>$misucursal]);

        }



    }

     public function create()
    {
          return view("traslados.stock.plus");
    }
    public function store (NotificacionTraFormRequest $request)
    {
        $mytime = Carbon::now('America/Lima');
        $s_act=Auth::user()->id_s;

        $des=$request->get('radio');
        $res=$request->get('receptork');
        //nuevo articulo
        if($des=='nw'){
            $traslado=new Notificacion_Traslado;
            $traslado->idemisor=$s_act;
            $res=$request->get('receptork');
            $traslado->idreceptor=$request->get('receptork');
            $traslado->fecha_hora=$mytime->toDateTimeString();
            $traslado->nota=$request->get('notak');
            $traslado->estado='En espera'; //existe 3 estados: aceptado, rechazado :D
            $traslado->nuevo=1;
            $traslado->save();

            $cont = 0;
            //AHORA NOS VAMOS A LOS DETALLES DE ARTICULOS
            $idarticulo = $request->get('idarticulok'); //son array's
            $cantidad = $request->get('cantidadk');
            $precio_venta = $request->get('pventa');
            $cantidad_vol = $request->get('cvolumen');
            $precio_mayor = $request->get('punitario');
            $cantidad_vol2 = $request->get('cvolumen2');
            $precio_mayor2 = $request->get('punitario2');
            $cantidad_vol3 = $request->get('cvolumen2');
            $precio_mayor3 = $request->get('punitario2');


              while($cont < count($idarticulo)){
	            $detalle = new DetalleNotTraslado();
	            $detalle->idnotificacion_tras=$traslado->idnotificacion_traslado;
	            $detalle->idarticulo= $idarticulo[$cont];
                $detalle->cantidad=$cantidad[$cont];
                $detalle->precio_venta=$precio_venta[$cont];
                $detalle->cantidad_volumen1=$cantidad_vol[$cont];
                $detalle->precio_mayor1=$precio_mayor[$cont];
                $detalle->cantidad_volumen2=$cantidad_vol2[$cont];
                $detalle->precio_mayor2=$precio_mayor2[$cont];
                $detalle->cantidad_volumen3=$cantidad_vol3[$cont];
                $detalle->precio_mayor3=$precio_mayor3[$cont];


	            $detalle->save();
	            $cont=$cont+1;

	        }
              Alert::success('En hora buena tu traslado será notificado a la sucursal o almacen correspondiente para ser aprobado', 'Mensaje del Sistema')->persistent("Close");

        }else{ //es porque no es un nuevo art. , y hay q evualuar el check :D
            $tipo=$request->get('tipo1');
            //extrayendo el valor del check
            if($tipo=='1'){ //traslado en base a mi sucursal y la otra
            $res=$request->get('receptor');
            $traslado=new Notificacion_Traslado;
            $traslado->idemisor=$s_act;
            $traslado->idreceptor=$request->get('receptor');
            $traslado->fecha_hora=$mytime->toDateTimeString();
            $traslado->nota=$request->get('nota');
            $traslado->estado='En espera'; //existe 3 estados: aceptado, rechazado :D
            $traslado->nuevo='No';
            $traslado->save();

            $cont = 0;
            //AHORA NOS VAMOS A LOS DETALLES DE ARTICULOS
            $idarticulo = $request->get('idarticulo'); //son array's
            $cantidad = $request->get('cantidad');


              while($cont < count($idarticulo)){
	            $detalle = new DetalleNotTraslado();
	            $detalle->idnotificacion_tras=$traslado->idnotificacion_traslado;
	            $detalle->idarticulo= $idarticulo[$cont];
                $detalle->cantidad=$cantidad[$cont];
                $detalle->precio_venta=0;
                $detalle->cantidad_volumen1=0;
                $detalle->precio_mayor1=0;
                $detalle->cantidad_volumen2=0;
                $detalle->precio_mayor2=0;
                $detalle->cantidad_volumen3=0;
                $detalle->precio_mayor3=0;

	            $detalle->save();
	            $cont=$cont+1;

	        }
            }else{
            $res=$request->get('receptor0');
            $traslado=new Notificacion_Traslado;
            $traslado->idemisor=$s_act;
            $traslado->idreceptor=$request->get('receptor0');
            $traslado->fecha_hora=$mytime->toDateTimeString();
            $traslado->nota=$request->get('nota0');
            $traslado->estado='En espera'; //existe 3 estados: aceptado, rechazado :D
            $traslado->nuevo='No';
            $traslado->save();

            $cont = 0;
            //AHORA NOS VAMOS A LOS DETALLES DE ARTICULOS
            $idarticulo = $request->get('idarticulo0'); //son array's
            $cantidad = $request->get('cantidad0');


              while($cont < count($idarticulo)){
	            $detalle = new DetalleNotTraslado();
	            $detalle->idnotificacion_tras=$traslado->idnotificacion_traslado;
	            $detalle->idarticulo= $idarticulo[$cont];
                $detalle->cantidad=$cantidad[$cont];
                $detalle->precio_venta=0;
                $detalle->cantidad_volumen1=0;
                $detalle->precio_mayor1=0;
                $detalle->cantidad_volumen2=0;
                $detalle->precio_mayor2=0;
                $detalle->cantidad_volumen3=0;
                $detalle->precio_mayor3=0;

	            $detalle->save();
	            $cont=$cont+1;

	        }

            }

            Alert::success('En hora buena tu traslado será notificado a la sucursal o almacen correspondiente para ser aprobado', 'Mensaje del Sistema')->persistent("Close");
        }
//lo de abajo es para notificaciones luego :b
          /*$notificacion=DB::table('user_sucursal as us')
                    ->select('us.iduser_sucursal','us.not_tras')
                    ->where('us.idsucursal','=',$res)
                    ->get();
           foreach($notificacion as $not){
               $ant=$not->not_tras;
               $desp=$ant+1;
               //hacemos update, el bucle se hace pq no todos reciben una misma catn de notif.
                DB::table('user_sucursal as un')
               ->where('un.iduser_sucursal', $not->iduser_sucursal)
               ->update(['un.not_tras' =>$desp]);
           }*/


      //apura la vista :v
        return Redirect::to('traslados/realizados');
    }
}
