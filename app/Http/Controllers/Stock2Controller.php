<?php

namespace sisVentas\Http\Controllers;

use Illuminate\Http\Request;
use sisVentas\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sisVentas\Http\Requests\StockFormRequest;
use sisVentas\Http\Requests\NotificacionPedFormRequest;
use sisVentas\Notificacion_Pedido;
use sisVentas\DetalleNotPedido;
use DB;
use Fpdf;
use \PDF;
use DomPdf;
use Auth;
use Alert;

use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;


class Stock2Controller extends Controller
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

                $bajo=DB::table('articulo as a')
                ->select('a.idarticulo',DB::raw('SUM(a.stockmin-a.stock) as resta'),DB::raw('CONCAT(a.codigo, " ",a.nombre) AS name'))
                ->orderBy('a.idarticulo','desc')
                ->groupBy('a.idarticulo')
                ->havingRaw('SUM(a.stockmin-a.stock) >= 0')
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

                $bajo=DB::table('traslado as t')
                ->join('articulo as a','a.idarticulo','=','t.idarticulo')
                ->select('t.idarticulo','t.idtraslado',DB::raw('CONCAT(a.codigo, " ",a.nombre) AS name'),DB::raw('SUM(t.stockmin-t.stock) as resta'))
                ->where('t.idsucursal','=',$idsucursal)
                ->orderBy('t.idtraslado','desc')
                ->groupBy('t.idtraslado')
                ->havingRaw('SUM(t.stockmin-t.stock) >= 0')
                ->get();

            }


           return view('pedidos.stock.index',["articulos"=>$articulos,"searchText"=>$query, "sucursales" =>$sucursales,"misucursal"=>$misucursal,"bajo"=>$bajo]);

        }
    }
//Ahora en eeste controlador se almacenara los pedidos en la tabla pedido :v
public function create()
{
     return view("pedidos.stock.plus");
}
public function store (NotificacionPedFormRequest $request)
{
   $mytime = Carbon::now('America/Lima');
   $s_act=Auth::user()->id_s;
   $des=$request->get('radio');
   $res=$request->get('receptork');
   //nuevo articulo
   if($des=='nw'){ //para el segundo radio button
       $pedido=new Notificacion_Pedido;
       $pedido->idemisor=$s_act;
       $res=$request->get('receptork');
       $pedido->idreceptor=$request->get('receptork');
       $pedido->fecha_hora=$mytime->toDateTimeString();
       $pedido->nota=$request->get('notak');
       $pedido->estado='En espera'; //existe 3 estados: aceptado, rechazado :D
       $pedido->save();

       $cont = 0;
       //AHORA NOS VAMOS A LOS DETALLES DE ARTICULOS
       $idarticulo = $request->get('idarticulok'); //son array's
       $cantidad = $request->get('cantidadk');


         while($cont < count($idarticulo)){
         $detalle = new DetalleNotPedido();
         $detalle->idnotificacion_pedido=$pedido->idnotificacion_pedido;
         $detalle->idarticulo= $idarticulo[$cont];
         $detalle->cantidad=$cantidad[$cont];
         $detalle->pp=1; //se da entender q es aceptado :c
         $detalle->save();
         $cont=$cont+1;

       }// fin del while



   }else{
     $pedido=new Notificacion_Pedido;
     $pedido->idemisor=$s_act;
     $res=$request->get('receptor0');
     $pedido->idreceptor=$request->get('receptor0');
     $pedido->fecha_hora=$mytime->toDateTimeString();
     $pedido->nota=$request->get('nota0');
     $pedido->estado='En espera'; //existe 3 estados: aceptado, rechazado :D
     $pedido->save();

     $cont = 0;
     //AHORA NOS VAMOS A LOS DETALLES DE ARTICULOS
     $idarticulo = $request->get('idarticulo0'); //son array's
     $cantidad = $request->get('cantidad0');


       while($cont < count($idarticulo)){
       $detalle = new DetalleNotPedido();
       $detalle->idnotificacion_pedido=$pedido->idnotificacion_pedido;
       $detalle->idarticulo= $idarticulo[$cont];
       $detalle->cantidad=$cantidad[$cont];
       $detalle->pp=1; //se da entender q es aceptado :c
       $detalle->save();
       $cont=$cont+1;

     }// fin del while

   }//fin del if

   //Ahora la notificacion para los user's de la sucursal opuesta
   $notificacion=DB::table('user_sucursal as us')
           ->select('us.iduser_sucursal','us.not_ped')
           ->where('us.idsucursal','=',$res)
           ->get();
  foreach($notificacion as $not){
      $ant=$not->not_ped;
      $desp=$ant+1;
      //hacemos update, el bucle se hace pq no todos reciben una misma catn de notif.
       DB::table('user_sucursal as un')
      ->where('un.iduser_sucursal', $not->iduser_sucursal)
      ->update(['un.not_ped' =>$desp]);
  }
   Alert::success('En hora buena tu pedido será notificado a la sucursal o almacen correspondiente para ser aprobado', 'Mensaje del Sistema')->persistent("Close");
   return Redirect::to('pedidos/stock');
 }//fin de la function
}//fin controlador
