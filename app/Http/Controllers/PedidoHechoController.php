<?php

namespace sisVentas\Http\Controllers;


use Illuminate\Http\Request;
use sisVentas\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sisVentas\Http\Requests\NotificacionPedFormRequest;
use sisVentas\Notificacion_Pedido;
use sisVentas\DetalleNotPedido;
use DB;
use Auth;
use Alert;

use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;

class PedidoHechoController extends Controller
{
          public function __construct()
         {
             $this->middleware('auth');

         }

         public function index()
        {
          $idsucursal=Auth::user()->id_s;
          if($idsucursal=='3'){
            //estoy en almacen central, por lo q mis articulos de la tabla detalle articulo

            $misarticulos_sin = DB::table('detalle_articulo as da')
            ->join('articulo as art','art.idarticulo','=','da.idarticulo')
            ->select(DB::raw('CONCAT(da.codigo, " ",art.nombre, " color ",da.etiqueta) AS articulo'),'da.iddetalle_articulo','da.UN1','da.UN2','da.tam_nro1','da.tam_nro2')
             ->orderBy('da.iddetalle_articulo','desc')
            ->get();

            $misarticulos_con=DB::table('detalle_articulo as da')
           ->join('articulo as art','art.idarticulo','=','da.idarticulo')
           ->select(DB::raw('CONCAT(da.codigo, " ",art.nombre, " color ",da.etiqueta) AS articulo'),'da.iddetalle_articulo','da.UN1','da.UN2','da.tam_nro1','da.tam_nro2')
           ->groupBy('da.iddetalle_articulo')
           ->havingRaw('SUM(da.stockmin-da.num_stock_gn) >= 0')
           ->get();

          }else{
            //no soy almacen, por ende me voy a la tabla traslado, el sin=sinfiltro; con:confiltro de stockbajo
            $misarticulos_sin=DB::table('traslado as t')
            ->join('detalle_articulo as da','da.iddetalle_articulo','=','t.idarticulo')
            ->join('articulo as art','art.idarticulo','=','da.idarticulo')
            ->select(DB::raw('CONCAT(da.codigo, " ",art.nombre, " color ",da.etiqueta) AS articulo'),'da.iddetalle_articulo','da.UN1','da.UN2','da.tam_nro1','da.tam_nro2')
            ->where('t.idsucursal','=',$idsucursal)
            ->orderBy('t.idtraslado','desc')
            ->get();
            $misarticulos_con=DB::table('traslado as t')
            ->join('detalle_articulo as da','da.iddetalle_articulo','=','t.idarticulo')
            ->join('articulo as art','art.idarticulo','=','da.idarticulo')
            ->select(DB::raw('CONCAT(da.codigo, " ",art.nombre, " color ",da.etiqueta) AS articulo'),'da.iddetalle_articulo','da.UN1','da.UN2','da.tam_nro1','da.tam_nro2')
            ->where('t.idsucursal','=',$idsucursal)
            ->groupBy('t.idtraslado')
            ->havingRaw('SUM(t.stockmin-t.stock) >= 0')
            ->get();
          }

          $sucursales=DB::table('sucursal')->get();

          //le mandamos para el index
          $pedidos=DB::table('notificacion_pedido as nt')
          ->where('nt.idemisor','=',$idsucursal)
          ->get();

          $details=DB::table('detalle_pedido as dp')
            ->join('detalle_articulo as da','da.iddetalle_articulo','=','dp.idarticulo')
            ->join('articulo as art','art.idarticulo','=','da.idarticulo')
            ->select(DB::raw('CONCAT(da.codigo, " ",art.nombre, " color ",da.etiqueta) AS articulo'),'dp.iddetalle_pedido','da.UN1','da.UN2','da.tam_nro1','da.tam_nro2','dp.cantidad','dp.pp','dp.idsucursal','dp.cant_pp','dp.idnotificacion_pedido')
            ->get();
        

          return view('pedidos/realizados/index',["sucursales"=>$sucursales,"misarticulos_sin"=>$misarticulos_sin,"misarticulos_con"=>$misarticulos_con,"pedidos"=>$pedidos,"details"=>$details]);
        }

        public function byStock($id){
          //con ello extraemos los stock por cada sucursal
          $idsucursal=Auth::user()->id_s;
          if($idsucursal=='3'){
            //pq estoy en almacen, y los demas stock esta en las sucursales
            $stock_actual=DB::table('traslado as t')
            ->select('t.stock','t.idsucursal')
            ->where('t.idarticulo','=',$id)
            ->get();
            $stock_actual_al='mensaje'; //lo hare para comprobar en el jquery, verifico si estoy aqui :v
            $mistock=DB::table('detalle_articulo as dt')
            ->select('dt.num_stock_gn')
            ->where('dt.iddetalle_articulo','=',$id)
            ->get();
          }else{
            //estoy en sucursal :v tengo q extraer de 2 tablas
            $stock_actual_al=DB::table('detalle_articulo as da')
            ->select('da.num_stock_gn')
            ->where('da.iddetalle_articulo','=',$id)
            ->get();

            $stock_actual=DB::table('traslado as t')
            ->select('t.stock','t.idsucursal')
            ->where('t.idarticulo','=',$id)
            ->get();
            //se deduce q mi stok esta en la tabla traslado
            $mistock='incluido';

          }
          //mandamos los 3 parametros
          return  ([$stock_actual_al,$stock_actual,$mistock]);
        }


          public function byStock2($id){
          //con ello extraemos los stock por cada sucursal
          $idsucursal=Auth::user()->id_s;
          if($idsucursal=='3'){
            $msj='mensaje1'; //lo hare para comprobar en el jquery, verifico si estoy aqui :v
            $mistock=DB::table('detalle_articulo as dt')
            ->select('dt.num_stock_gn')
            ->where('dt.iddetalle_articulo','=',$id)
            ->get();
              foreach ($mistock as $key ) {
              $tr=$key->num_stock_gn;
            }
          }else{

            $msj='mensaje2'; 
            $mistock=DB::table('traslado as t')
            ->select('t.stock')
            ->where('t.idarticulo','=',$id)
            ->where('t.idsucursal','=',$idsucursal)
            ->get();
            foreach ($mistock as $key ) {
              $tr=$key->stock;
            }
          }
          //mandamos los 3 parametros
          return  ([$tr,$msj]);
        }

        public function create()
        {
            return view("pedidos.realizados.plus"); //espero q no haya conflicto :s 
        }
        public function store (NotificacionPedFormRequest $request)
        {
           $mytime2 = Carbon::now('America/Lima');
           $sucursal=Auth::user()->id_s;
           $verificar=$request->get('extra');

           if($verificar=='plus'){
              //entonces notificacion sucursal, llenamos detalles
             $idarticulo = $request->get('idarticulo'); //son array's
             $cantidad = $request->get('cantidad');
             $sucursal_i= $request->get('idsuc');

             $not=new Notificacion_Pedido;
             $not->idemisor=$sucursal;
             $not->fecha_hora=$mytime2->toDateTimeString();
             $not->estado='En espera';
             $not->nota=$request->get('nota');
             $not->pedido_prov=0; //significa q los pedidos solo son para las sucursales 
             $not->save();

          //recorremos el while
            $cont=0;
                  
                   while($cont < count($idarticulo)){
                     $detalle = new DetalleNotPedido();
                     $detalle->idnotificacion_pedido=$not->idnotificacion_pedido;
                     $detalle->idarticulo= $idarticulo[$cont];
                     $ex=$idarticulo[$cont];
                     $detalle->cantidad=$cantidad[$cont];
                     $detalle->idsucursal=$sucursal_i[$cont];
                     $detalle->pp=1;  //aceptado
                     $detalle->cant_pp=0; // la cantidad q se envia a proveedor :´v 
                     //viendo el idproveedor el primero :v
                     $idprov=DB::table('detalle_proveedor as dp')
                     ->select('dp.idproveedor')
                     ->where('dp.idarticulo','=',$ex)
                     ->get();
                     $tam=count($idprov);
                     if($tam=='0'){
                      //no hubo designacion, por lo q ponemos general o libre la cual es id==1
                       $erina=1;

                     }else{
                       //recorremos el for, el problema es q si no esta designado :c 
                       foreach ($idprov as $key ) {
                         $erina=$key->idproveedor;
                       }

                     }
                    
                     $detalle->idproveedor=$erina;
                     $detalle->save();
                     $cont=$cont+1;
                   }

           }else{
              //entonces notificacion proveedor, entonces cambia el tipo de notificacion  :s
               $idarticulo = $request->get('idarticulo2'); //son array's
               $cantidad = $request->get('cantidad2');
               $not=new Notificacion_Pedido;
               $not->idemisor=$sucursal;
               $not->fecha_hora=$mytime2->toDateTimeString();
               $not->estado='En espera';
               $not->nota=$request->get('nota2');
               $not->pedido_prov=1; //significa q los pedidos solo son para proveedores
               $not->save();

               //recorremos el while
            $cont=0;
                  
                   while($cont < count($idarticulo)){
                     $detalle = new DetalleNotPedido();
                     $detalle->idnotificacion_pedido=$not->idnotificacion_pedido;
                     $detalle->idarticulo= $idarticulo[$cont];
                     $ex=$idarticulo[$cont];
                     $detalle->cantidad=0; //esto ya no lo mostrare en el modal de pedido_proveedor :v 
                     $detalle->idsucursal=3; //pq todas las notificaciones le llega a almacen central
                     $detalle->pp=1;  //aceptado, en un inicio 
                     $detalle->cant_pp=$cantidad[$cont]; // la cantidad q se envia a proveedor :´v 
                     //viendo el idproveedor el primero :v
                     $idprov=DB::table('detalle_proveedor as dp')
                     ->select('dp.idproveedor')
                     ->where('dp.idarticulo','=',$ex)
                     ->get();
                     $tam=count($idprov);
                     if($tam=='0'){
                      //no hubo designacion, por lo q ponemos general o libre la cual es id==1
                       $erina=1;

                     }else{
                       //recorremos el for, el problema es q si no esta designado :c 
                       foreach ($idprov as $key ) {
                         $erina=$key->idproveedor;
                       }

                     }
                    
                     $detalle->idproveedor=$erina;
                     $detalle->save();
                     $cont=$cont+1;
                   }

           }

            Alert::success('En hora buena tu pedido será notificado a la sucursal o almacen correspondiente para ser aprobado', 'Mensaje del Sistema')->persistent("Close");
            return Redirect::to('pedidos/realizados');
           
        }
        public function show($id)
        {

        }
        public function edit($id)
        {

        }
        public function update(NotificacionPedFormRequest $request,$id)
        {

        }
        public function destroy($id)
        {

        }
}
