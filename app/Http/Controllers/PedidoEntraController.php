<?php

namespace sisVentas\Http\Controllers;

use Illuminate\Http\Request;
use sisVentas\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use sisVentas\Notificacion_Pedido;
use sisVentas\Notificacion_Traslado;
use sisVentas\DetalleNotPedido;
use sisVentas\Http\Requests\NotificacionPedFormRequest;
use DB;
use Fpdf;
use \PDF;
use DomPdf;
use Auth;
use Alert;

use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;

class PedidoEntraController extends Controller
{
  public function __construct()
{
    $this->middleware('auth');
}

public function index(Request $request)
{
          $idsucursal=Auth::user()->id_s;
          $sucursales=DB::table('sucursal')->get();

          //le mandamos para el index
          $pedidos=DB::table('notificacion_pedido as nt')
          ->join('detalle_pedido as d','d.idnotificacion_pedido','=','nt.idnotificacion_pedido')
          ->where('d.idsucursal','=',$idsucursal)
          ->where('nt.pedido_prov','=','0')
          ->groupBy('nt.idnotificacion_pedido')
          ->get();

            $details=DB::table('detalle_pedido as dp')
            ->join('detalle_articulo as da','da.iddetalle_articulo','=','dp.idarticulo')
            ->join('articulo as art','art.idarticulo','=','da.idarticulo')
            ->select(DB::raw('CONCAT(da.codigo, " ",art.nombre, " color ",da.etiqueta) AS articulo'),'dp.iddetalle_pedido','da.UN1','da.UN2','da.tam_nro1','da.tam_nro2','da.num_stock_gn','dp.cantidad','dp.pp','dp.idsucursal','dp.cant_pp','dp.idnotificacion_pedido')
            ->get();
        

          return view('pedidos/entrantes/index',["sucursales"=>$sucursales,"pedidos"=>$pedidos,"details"=>$details]);

}

public function byupdate($id1,$id2,$id3,$id4){
  //recibiendo del ajax
  //id1 id de dettalle, id2 la cantidad y el otro es el pp, el id4 es el emisor en caso de que se almacene en pedidos
  //proveedor
    if($id3=='1'){
      //solo editamos
      DB::table('detalle_pedido as dp')
      ->where('dp.iddetalle_pedido', $id1 )
      ->update(['dp.cantidad' =>$id2, 'dp.pp'=>'1']);

      //mandando una variable

    }else{
      //mandamos a la tabla provedor-pedido, y le mandamos el parametro id4 que es el emisor
      DB::table('detalle_pedido as dp')
      ->where('dp.iddetalle_pedido', $id1 )
      ->update(['dp.pp'=>'0','dp.cantidad' =>$id2]);
      //Consultando que articulo es
    $articulo= DB::table('detalle_pedido as de')
      ->select('de.idarticulo')
      ->where('de.iddetalle_pedido','=',$id1)
      ->get();
  foreach ($articulo as $a) {
    $idf=$a->idarticulo;
  }
      $mytime3 = Carbon::now('America/Lima');
      //ahora agregamos al proveedor
      DB::table('pedido_proveedor')->insert(
      ['idarticulo' =>  $idf, 'cantidad' => $id2 , 'fecha_hora' => $mytime3->toDateTimeString(),'idsucursal' =>$id4]);
    }
  }
//aceptar

public function edit($id)
{
   return view("pedidos.entrantes.show",["pedido"=>Notificacion_Pedido::findOrFail($id)]);
}


public function update(NotificacionPedFormRequest $request,$id)
{
    //el id que se pasa es el idnotificacion_pedido, ahora cuando se acepta debe hacerce un traslado :v
    $idsucursal=Auth::user()->id_s; //Yo soy el emisor para el traslado
    $sucursal=Auth::user()->s_actual;
    $rechazo=$request->get('rechazar');
    $receptor_t=$request->get('recep_tra');
    $mytime3 = Carbon::now('America/Lima');


        if($rechazo=='1'){ //es por que lo rechazo T.T
           $noti=Notificacion_Pedido::findOrFail($id);
           $noti->nota=$request->get('note');
           $noti->estado='Rechazado';
           $noti->update();

           $notificacion=DB::table('user_sucursal as us')
                     ->select('us.iduser_sucursal','us.not_ped')
                     ->where('us.idsucursal','=',$receptor_t)
                     ->get();

            foreach($notificacion as $not){
                $ant=$not->not_ped;
                $desp=$ant+1;
                //hacemos update, el bucle se hace pq no todos reciben una misma catn de notif.
                 DB::table('user_sucursal as un')
                ->where('un.iduser_sucursal', $receptor_t)
                ->update(['un.not_ped' =>$desp]);
            }

          Alert::success('El pedido fue rechazado exitosamente', 'Mensaje del Sistema')->persistent("Close");

        }else{
        //Es aceptado Totalmente :v, pero hay que ver si es acpetado regular
          if($idsucursal=='3'){ //pq estoy en almacen

            $buscar=DB::table('detalle_pedido as dt')
            ->select('dt.cantidad','dt.idarticulo')
            ->where('dt.idnotificacion_pedido','=',$id)
            ->where('pp','=','1')
            ->get();
             //ingresamos un nuevo traslado, ya que lo notificaremos
              $tras_p=new Notificacion_Traslado;
              $tras_p->idemisor='3';
              $tras_p->idreceptor=$receptor_t;
              $tras_p->fecha_hora=$mytime3->toDateTimeString();
              $tras_p->nota="Respuesta a Pedido";
              $tras_p->nuevo="No";
              $tras_p->save();

            //recorremos el detalle_pedido
                foreach ($buscar as $bus) {
                  # Como estoy en almacen ese es mi articulo, ademas yo soy el receptor ahora debo darele respuesta
                  $miarticulo=DB::table('articulo as a')
                  ->select('a.idarticulo','a.stock')
                  ->where('a.idarticulo','=',$bus->idarticulo)
                  ->get();

                  $suarticulo=DB::table('traslado as t')
                  ->select('t.idarticulo','t.stock')
                  ->where('t.idsucursal','=',$receptor_t)
                  ->where('t.idarticulo','=',$bus->idarticulo)
                  ->get();


                  foreach ($miarticulo as $key1) {
                    $mistock0=$key1->stock;
                  }

                  foreach ($suarticulo as $sus2) {
                    $sustock0=$sus2->stock;
                  }


                  $cantidad_act=$bus->cantidad;
                  $mistock=$mistock0 - $cantidad_act;
                  $sustock=$sustock0 + $cantidad_act;

                  //update para ambas tablas
                  DB::table('traslado as tu')
                 ->where('tu.idsucursal','=',$receptor_t)
                 ->where('tu.idarticulo','=',$bus->idarticulo)
                 ->update(['tu.stock' =>$sustock]);

                 DB::table('articulo as ar')
                ->where('ar.idarticulo', $bus->idarticulo)
                ->update(['ar.stock' =>$mistock]);

                  //Agregando Movimiento para mi
                    DB::table('movimiento')->insert(
                      ['idarticulo' =>  $bus->idarticulo, 'tipo_movimiento' => 'Salida' ,'motivo' => 'Traslado', 'cantidad' => $bus->cantidad, 'estado' => 'Activo' , 'fecha_mov' => $mytime3->toDateTimeString(),'idsucursal' =>$idsucursal,'nota'=>'-']);

                   //Agregando movimiento para él
                     DB::table('movimiento')->insert(
                      ['idarticulo' => $bus->idarticulo, 'tipo_movimiento' => 'Entrada' ,'motivo' => 'Traslado', 'cantidad' => $bus->cantidad, 'estado' => 'Activo' , 'fecha_mov' => $mytime3->toDateTimeString(),'idsucursal' =>$receptor_t,'nota'=>'-']);

                     DB::table('detalle_traslado')->insert(
                       ['idnotificacion_tras' => $tras_p->idnotificacion_tras, 'idarticulo' => $bus->idarticulo , 'cantidad' => $bus->cantidad]);



                }//fin del foreach
          }else{ //no estoy en almacen
                  if($receptor_t=='3'){ //verifico si el que hace el pedido es almacen
                    $buscar=DB::table('detalle_pedido as dt')
                    ->select('dt.cantidad','dt.idarticulo')
                    ->where('dt.idnotificacion_pedido','=',$id)
                    ->where('pp','=','1')
                    ->get();

                    $tras_p=new Notificacion_Traslado;
                    $tras_p->idemisor='3';
                    $tras_p->idreceptor=$receptor_t;
                    $tras_p->fecha_hora=$mytime3->toDateTimeString();
                    $tras_p->nota="Respuesta a Pedido";
                    $tras_p->nuevo="No";
                    $tras_p->save();
                    //recorremos el detalle_pedido
                        foreach ($buscar as $bus) {
                          # Como estoy en almacen ese es mi articulo, ademas yo soy el receptor ahora debo darele respuesta
                          $suarticulo=DB::table('articulo as a')
                          ->select('a.idarticulo','a.stock')
                          ->where('a.idarticulo','=',$bus->idarticulo)
                          ->get();

                          $miarticulo=DB::table('traslado as t')
                          ->select('t.idarticulo','t.stock')
                          ->where('t.idsucursal','=',$idsucursal)
                          ->where('t.idarticulo','=',$bus->idarticulo)
                          ->get();

                          foreach ($miarticulo as $key1) {
                            $mistock0=$key1->stock;
                          }

                          foreach ($suarticulo as $key2) {
                            $sustock0=$key2->stock;
                          }


                          $cantidad_act=$bus->cantidad;
                          $mistock=$mistock0 - $cantidad_act;
                          $sustock=$sustock0 + $cantidad_act;


                          //update para ambas tablas
                          DB::table('traslado as tu')
                         ->where('tu.idsucursal','=',$idsucursal)
                         ->where('tu.idarticulo','=',$bus->idarticulo)
                         ->update(['tu.stock' =>$mistock]);

                         DB::table('articulo as ar')
                        ->where('ar.idarticulo', $bus->idarticulo)
                        ->update(['ar.stock' =>$sustock]);

                          //Agregando Movimiento para mi
                            DB::table('movimiento')->insert(
                              ['idarticulo' =>  $bus->idarticulo, 'tipo_movimiento' => 'Salida' ,'motivo' => 'Traslado', 'cantidad' => $bus->cantidad, 'estado' => 'Activo' , 'fecha_mov' => $mytime3->toDateTimeString(),'idsucursal' =>$idsucursal,'nota'=>'-']);

                           //Agregando movimiento para él
                             DB::table('movimiento')->insert(
                              ['idarticulo' => $bus->idarticulo, 'tipo_movimiento' => 'Entrada' ,'motivo' => 'Traslado', 'cantidad' => $bus->cantidad, 'estado' => 'Activo' , 'fecha_mov' => $mytime3->toDateTimeString(),'idsucursal' =>$receptor_t,'nota'=>'-']);

                              DB::table('detalle_traslado')->insert(
                                ['idnotificacion_tras' => $tras_p->idnotificacion_tras, 'idarticulo' => $bus->idarticulo , 'cantidad' => $bus->cantidad]);
                        }//fin del foreach

                  }else{ //Los 2 son sucursales

                    $buscar=DB::table('detalle_pedido as dt')
                    ->select('dt.cantidad','dt.idarticulo')
                    ->where('dt.idnotificacion_pedido','=',$id)
                    ->where('pp','=','1')
                    ->get();


                    $tras_p=new Notificacion_Traslado;
                    $tras_p->idemisor='3';
                    $tras_p->idreceptor=$receptor_t;
                    $tras_p->fecha_hora=$mytime3->toDateTimeString();
                    $tras_p->nota="Respuesta a Pedido";
                    $tras_p->nuevo="No";
                    $tras_p->save();
                    //recorremos el detalle_pedido
                        foreach ($buscar as $bus) {
                          # Como estoy en almacen ese es mi articulo, ademas yo soy el receptor ahora debo darele respuesta
                          $suarticulo=DB::table('traslado as ta')
                          ->select('ta.idarticulo','ta.stock')
                          ->where('ta.idsucursal','=',$receptor_t)
                          ->where('ta.idarticulo','=',$bus->idarticulo)
                          ->get();

                          $miarticulo=DB::table('traslado as t')
                          ->select('t.idarticulo','t.stock')
                          ->where('t.idsucursal','=',$idsucursal)
                          ->where('t.idarticulo','=',$bus->idarticulo)
                          ->get();

                          foreach ($miarticulo as $key1) {
                            $mistock0=$key1->stock;
                          }

                          foreach ($suarticulo as $key2) {
                            $sustock0=$key2->stock;
                          }


                          $cantidad_act=$bus->cantidad;
                          $mistock=$mistock0 - $cantidad_act;
                          $sustock=$sustock0 + $cantidad_act;

                          //update para ambas tablas
                          DB::table('traslado as tu')
                         ->where('tu.idsucursal','=',$receptor_t)
                         ->where('tu.idarticulo','=',$bus->idarticulo)
                         ->update(['tu.stock' =>$mistock]);

                         DB::table('traslado as tu')
                        ->where('tu.idsucursal','=',$idsucursal)
                        ->where('tu.idarticulo','=',$bus->idarticulo)
                        ->update(['tu.stock' =>$mistock]);

                          //Agregando Movimiento para mi
                            DB::table('movimiento')->insert(
                              ['idarticulo' =>  $bus->idarticulo, 'tipo_movimiento' => 'Salida' ,'motivo' => 'Traslado', 'cantidad' => $bus->cantidad, 'estado' => 'Activo' , 'fecha_mov' => $mytime3->toDateTimeString(),'idsucursal' =>$idsucursal,'nota'=>'-']);

                           //Agregando movimiento para él
                             DB::table('movimiento')->insert(
                              ['idarticulo' => $bus->idarticulo, 'tipo_movimiento' => 'Entrada' ,'motivo' => 'Traslado', 'cantidad' => $bus->cantidad, 'estado' => 'Activo' , 'fecha_mov' => $mytime3->toDateTimeString(),'idsucursal' =>$receptor_t,'nota'=>'-']);

                              DB::table('detalle_traslado')->insert(
                                ['idnotificacion_tras' => $tras_p->idnotificacion_tras, 'idarticulo' => $bus->idarticulo , 'cantidad' => $bus->cantidad]);
                        }//fin del foreach

                  }//fin si el receptor del pedido era almacen o no
          }//fin si estaba en almacen o no

            //vereficamos si fue modificado o no
            $verifico2=$request->get('modi');
            if($verifico2==" "){
              //significa que nada se modifico
              $notif=Notificacion_Pedido::findOrFail($id);
              $notif->estado='Aceptado';
              $notif->update();


              //traslado a notificar
              DB::table('notificacion_traslado')->insert(
               ['idemisor' => $idsucursal, 'idreceptor' => $receptor_t ,'fecha_hora' => $mytime3->toDateTimeString(),'nota'=>'-','Aceptado','nuevo'=>'No','tp'=>'1']);

              Alert::success('En buena hora, la cantidad de cada articulo fue agregada exitosamente a la sucursal correspondiente', 'Mensaje del Sistema')->persistent("Close");
            }else{
              //se modifico
              $notif=Notificacion_Pedido::findOrFail($id);
              $notif->estado='Aceptado Parcialmente';
              $notif->update();

              DB::table('notificacion_traslado')->insert(
               ['idemisor' => $idsucursal, 'idreceptor' => $receptor_t ,'fecha_hora' => $mytime3->toDateTimeString(),'nota'=>'-','Aceptado','nuevo'=>'No','tp'=>'2']);

              Alert::success('En buena hora, la cantidad de cada articulo fue agregada parcialmente a la sucursal correspondiente', 'Mensaje del Sistema')->persistent("Close");
            }

            $notificacion=DB::table('user_sucursal as us')
                      ->select('us.iduser_sucursal','us.not_tras')
                      ->where('us.idsucursal','=',$receptor_t)
                      ->get();
             foreach($notificacion as $not){
                 $ant=$not->not_tras;
                 $desp=$ant+1;
                 //hacemos update, el bucle se hace pq no todos reciben una misma catn de notif.
                  DB::table('user_sucursal as un')
                 ->where('un.iduser_sucursal', $receptor_t)
                 ->update(['un.not_tras' =>$desp]);
             }
        }//fin del else si no se rechazo


        return Redirect::to('traslados/realizados');

  }


}
