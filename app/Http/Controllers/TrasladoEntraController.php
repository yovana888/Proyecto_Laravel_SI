<?php

namespace sisVentas\Http\Controllers;
use Illuminate\Http\Request;
use sisVentas\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sisVentas\Notificacion_Traslado;
use sisVentas\DetalleNotTraslado;
use sisVentas\Http\Requests\NotificacionTraFormRequest;
use DB;
use Fpdf;
use \PDF;
use DomPdf;
use Auth;
use Alert;

use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;

class TrasladoEntraController extends Controller
{
      public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {

            $idsucursal=Auth::user()->id_s;
            $sucursal=Auth::user()->s_actual;

            $traslados=DB::table('notificacion_traslado as nt')
            ->join('sucursal as s','s.idsucursal','=','nt.idemisor')
            ->select('nt.idnotificacion_traslado','nt.idreceptor','nt.idemisor','s.razon','nt.nota','nt.fecha_hora','nt.nuevo','nt.estado')
            ->where('nt.idreceptor','=', $idsucursal)
            ->orderBy('nt.idnotificacion_traslado','desc')
            ->get();

           $detalles=DB::table('detalle_traslado as dt')
           ->join('detalle_articulo as da','da.iddetalle_articulo','=','dt.idarticulo')
           ->join('articulo as art','da.idarticulo','=','art.idarticulo')
           ->select(DB::raw('CONCAT(da.codigo, " ",art.nombre, " color ",da.etiqueta) AS articulo'),'da.UN1','da.UN2','da.tam_nro1','da.tam_nro2','dt.idnotificacion_tras','dt.idarticulo','dt.cantidad','dt.precio_venta','dt.cantidad_volumen1','dt.precio_mayor1','dt.cantidad_volumen2','dt.precio_mayor2','dt.cantidad_volumen3','dt.precio_mayor3','iddetalle_traslado')
           ->get();

               $sucursales=DB::table('sucursal')->get();

           return view('traslados.entrantes.index',["traslados"=>$traslados,"detalles"=>$detalles,"sucursales"=>$sucursales]);

    }

     public function edit($id)
    {
        return view("traslados.entrantes.edit",["traslado"=>Notificacion_Traslado::findOrFail($id)]);
    }
    public function update(NotificacionTraFormRequest $request,$id)
    {

        $idsucursal=Auth::user()->id_s;
        $sucursal=Auth::user()->s_actual;
        $rechazo=$request->get('rechazar');
        $emisor=$request->get('emisor');
        $mytime3 = Carbon::now('America/Lima');
        $nuevos=$request->get('new');



    if($nuevos=='0'){ //no son articulos nuevos
          if($rechazo=='1'){ //es por que lo rechazo T.T
             $noti=Notificacion_Traslado::findOrFail($id);
             $noti->nota=$request->get('note');
             $noti->estado='Rechazado';
             $noti->update();

               Alert::success('El traslado fue rechazado exitosamente', 'Mensaje del Sistema')->persistent("Close");

        }else{ //actualizar ambas tablas tanto emisor y receptor y agregar movimientos

           if($idsucursal==3) { //actualizar la tabla articulo directamente estoy en Almacen Central, estoy
             // loguedao aqui debe aumentar mi stock por tratar de aprobar la entrada
               $misarticulos=DB::table('detalle_articulo as da')
               ->select('da.iddetalle_articulo','da.num_stock_gn')
               ->get();

               $susarticulos=DB::table('traslado as t')
               ->select('t.idarticulo','t.stock')
               ->where('t.idsucursal','=',$emisor)
               ->get();

               foreach($misarticulos as $mio){
                   $ant=$mio->num_stock_gn;

                   $new0=DB::table('detalle_traslado as dt')
                       ->select('dt.cantidad')
                       ->where('dt.idnotificacion_tras','=',$id)
                       ->where('dt.idarticulo','=',$mio->iddetalle_articulo)
                       ->get();


                   foreach($new0 as $n){
                          $new=$n->cantidad;
                    }

                  if(isset($new)==false){ //Ahora verificamos si existe ese articulo del for en el detalle
                      //no hace nada, pq no existe

                  }else{
                      //EDITAMOS mi stock que, cabe considerar que esto sucede si los articulos que entran estan en buen estado, y por decir en la sucursal ya no tienen capacidad para guardar o estan en remodelacion
                       $pos=$new+$ant;
                        DB::table('detalle_articulo as ar')
                       ->where('ar.iddetalle_articulo', $mio->iddetalle_articulo)
                       ->update(['ar.num_stock_gn' =>$pos]);

                       //OBTENIENDO EL STOCK ANTERIOR DEL EMISOR
                      $antem0=DB::table('traslado as tra')
                            ->select('tra.stock')
                            ->where('tra.idsucursal','=',$emisor)
                            ->where('tra.idarticulo','=',$mio->iddetalle_articulo)
                            ->get();

                        foreach($antem0 as $a){
                          $antem=$a->stock;
                        }

                      //EDITO SU STOCK
                      $posem=$antem-$new;
                        DB::table('traslado as tu')
                       ->where('tu.idsucursal','=',$emisor)
                       ->where('tu.idarticulo','=',$mio->iddetalle_articulo)
                       ->update(['tu.stock' =>$posem]);

                     //Agregando Movimiento para mi
                       DB::table('movimiento')->insert(
                         ['idarticulo' =>  $mio->iddetalle_articulo, 'tipo_movimiento' => 'Entrada' ,'motivo' => 'Traslado', 'cantidad' => $new, 'estado' => 'Activo' , 'fecha_mov' => $mytime3->toDateTimeString(),'idsucursal' =>$idsucursal,'nota'=>'-']);

                      //Agregando movimiento para él
                        DB::table('movimiento')->insert(
                         ['idarticulo' =>  $mio->iddetalle_articulo, 'tipo_movimiento' => 'Salida' ,'motivo' => 'Traslado', 'cantidad' => $new, 'estado' => 'Activo' , 'fecha_mov' => $mytime3->toDateTimeString(),'idsucursal' =>$emisor,'nota'=>'-']);

                  }//fin else
               }//fin foreach para actualizar mi stock


           }else{ //actualizar la tabla traslado, pero hay q ver si es un articulo nuevo o hay q hacer update,
             //en la tabla articulo no sucede ya q el tiene todo pz :D, como tambien hay q ver si el emisor es Almacen

               if($emisor==3){ //viendo si el emisor es Almacen
                   //entonces la sucursal es el receptor

                   $sussarticulos=DB::table('detalle_articulo as da')
                   ->select('da.iddetalle_articulo','da.num_stock_gn')
                   ->get();

                   $misarticulos=DB::table('traslado as t')
                   ->select('t.idarticulo','t.stock')
                   ->where('t.idsucursal','=',$idsucursal)
                   ->get();


               foreach($misarticulos as $mio){
                   $ant=$mio->stock;
                   //esto es para ingresar el articulo nuevo
                   $new0=DB::table('detalle_traslado as dt')
                       ->select('dt.cantidad')
                       ->where('dt.idnotificacion_tras','=',$id)
                       ->where('dt.idarticulo','=',$mio->idarticulo)
                       ->get();

                   foreach($new0 as $n){
                          $new=$n->cantidad;
                    }

                  if(isset($new)==false){ //Ahora verificamos si existe ese articulo del for en el detalle
                      //no hace nada, pq no existe

                  }else{
                      //EDITAMOS mi stock que
                       $pos=$new+$ant;

                         DB::table('traslado as tu')
                       ->where('tu.idsucursal','=',$idsucursal)
                       ->where('tu.idarticulo','=',$mio->idarticulo)
                       ->update(['tu.stock' =>$pos]);


                       //OBTENIENDO EL STOCK ANTERIOR DEL EMISOR
                      $antem0=DB::table('detalle_articulo as art')
                            ->select('art.num_stock_gn')
                            ->where('art.iddetalle_articulo','=',$mio->idarticulo)
                            ->get();

                      //EDITO SU STOCK
                        foreach($antem0 as $a){
                          $antem=$a->num_stock_gn;
                        }

                      $posem=$antem-$new;

                        DB::table('detalle_articulo as ar')
                       ->where('ar.iddetalle_articulo', $mio->idarticulo)
                       ->update(['ar.num_stock_gn' =>$posem]);

                     //Agregando Movimiento para mi
                       DB::table('movimiento')->insert(
                         ['idarticulo' =>  $mio->idarticulo, 'tipo_movimiento' => 'Entrada' ,'motivo' => 'Traslado', 'cantidad' => $new, 'estado' => 'Activo' , 'fecha_mov' => $mytime3->toDateTimeString(),'idsucursal' =>$idsucursal,'nota'=>'-']);

                      //Agregando movimiento para él
                        DB::table('movimiento')->insert(
                         ['idarticulo' =>  $mio->idarticulo, 'tipo_movimiento' => 'Salida' ,'motivo' => 'Traslado', 'cantidad' => $new, 'estado' => 'Activo' , 'fecha_mov' => $mytime3->toDateTimeString(),'idsucursal' =>$emisor,'nota'=>'-']);

                  }//fin else
               }//fin foreach para actualizar mi stock, en caso de q el emisor sea almac.

             }else{ //aqui almacen ya no se involucra, almacen


                       $misarticulos=DB::table('traslado as t')
                       ->select('t.idarticulo','t.stock')
                       ->where('t.idsucursal','=',$idsucursal)
                       ->get();

                       $susarticulos=DB::table('traslado as t')
                       ->select('t.idarticulo','t.stock')
                       ->where('t.idsucursal','=',$emisor)
                       ->get();

                   foreach($misarticulos as $mio){
                   $ant=$mio->stock;
                   $new0=DB::table('detalle_traslado as dt')
                       ->select('dt.cantidad')
                       ->where('dt.idnotificacion_tras','=',$id)
                       ->where('dt.idarticulo','=',$mio->idarticulo)
                       ->get();

                  foreach($new0 as $n){
                          $new=$n->cantidad;
                    }



                  if(isset($new)==false){ //Ahora verificamos si existe ese articulo del for en el detalle
                      //no hace nada, pq no existe

                  }else{
                      //EDITAMOS mi stock que
                       $pos=$new+$ant;

                         DB::table('traslado as tu')
                       ->where('tu.idsucursal','=',$idsucursal)
                       ->where('tu.idarticulo','=',$mio->idarticulo)
                       ->update(['tu.stock' =>$pos]);


                       //OBTENIENDO EL STOCK ANTERIOR DEL EMISOR
                      $antem0=DB::table('traslado as tra')
                            ->select('tra.stock')
                            ->where('tra.idsucursal','=',$emisor)
                            ->where('tra.idarticulo','=',$mio->idarticulo)
                            ->get();

                      //EDITO SU STOCK
                        foreach($antem0 as $a){
                          $antem=$a->stock;
                        }

                      $posem=$antem-$new;

                        DB::table('traslado as tus')
                       ->where('tus.idsucursal','=',$emisor)
                       ->where('tus.idarticulo','=',$mio->idarticulo)
                       ->update(['tus.stock' =>$posem]);

                     //Agregando Movimiento para mi
                       DB::table('movimiento')->insert(
                         ['idarticulo' =>  $mio->idarticulo, 'tipo_movimiento' => 'Entrada' ,'motivo' => 'Traslado', 'cantidad' => $new, 'estado' => 'Activo' , 'fecha_mov' => $mytime3->toDateTimeString(),'idsucursal' =>$idsucursal,'nota'=>'-']);

                      //Agregando movimiento para él
                        DB::table('movimiento')->insert(
                         ['idarticulo' =>  $mio->idarticulo, 'tipo_movimiento' => 'Salida' ,'motivo' => 'Traslado', 'cantidad' => $new, 'estado' => 'Activo' , 'fecha_mov' => $mytime3->toDateTimeString(),'idsucursal' =>$emisor,'nota'=>'-']);

                  }//fin else
               }//fin foreach para actualizar mi stock, en caso de q el emisor sea almac.


               }//fin de sucusal a sucusal el traslado

           }

             $noti=Notificacion_Traslado::findOrFail($id);
             $noti->estado='Aceptado';
             $noti->update();

             Alert::success('En buena hora, la cantidad de cada articulo fue agregada exitosamente a tu sucursal', 'Mensaje del Sistema')->persistent("Close");
        }
    }else{ //Son articulos nuevos

        if($rechazo=='1'){ //es por que lo rechazo T.T
             $noti=Notificacion_Traslado::findOrFail($id);
             $noti->nota=$request->get('note');
             $noti->estado='Rechazado';
             $noti->update();

               Alert::success('El traslado fue rechazado exitosamente', 'Mensaje del Sistema')->persistent("Close");

        }else{ //Ahora si no lo rechazo


            if($emisor==3){ //vemos si el emisor es almacen o no
                $detalle=DB::table('detalle_traslado as dt')
                ->where('dt.idnotificacion_tras','=',$id)
                ->get();

                foreach($detalle as $det){

                       $act= $det->cantidad;
                       $ant=DB::table('detalle_articulo as k')
                        ->select('k.num_stock_gn','k.precio_det_u')
                       ->where('k.iddetalle_articulo','=',$det->idarticulo)
                       ->get();

                        foreach($ant as $a){
                            $antes=$a->num_stock_gn;
                            $precio_det=$a->precio_det_u;
                        }


                       $newstock=$antes-$act;

                        DB::table('detalle_articulo as ar')
                       ->where('ar.iddetalle_articulo','=',$det->idarticulo)
                       ->update(['ar.num_stock_gn' => $newstock]);

                       DB::table('traslado')->insert(
                             ['idarticulo' =>  $det->idarticulo, 'stock' => $det->cantidad, 'estado' => 'Activo' , 'fecha_hora' => $mytime3->toDateTimeString(),'idsucursal' =>$idsucursal,'precio_venta'=>$det->precio_venta,'stockmin'=>'0','cantidad_volumen1'=>$det->cantidad_volumen1,'precio_mayor1'=>$det->precio_mayor1,
                             'cantidad_volumen2'=>$det->cantidad_volumen2,'precio_mayor2'=>$det->precio_mayor2,'cantidad_volumen3'=>$det->cantidad_volumen3,'precio_mayor3'=>$det->precio_mayor3,'cantidad_detalle'=>'0','precio_detalle'=>$precio_det]);

                      //Agregando Movimiento para mi
                           DB::table('movimiento')->insert(
                             ['idarticulo' => $det->idarticulo, 'tipo_movimiento' => 'Entrada' ,'motivo' => 'Inventario Inicial', 'cantidad' => $det->cantidad, 'estado' => 'Activo' , 'fecha_mov' => $mytime3->toDateTimeString(),'idsucursal' =>$idsucursal,'nota'=>'-']);

                          //Agregando movimiento para él
                            DB::table('movimiento')->insert(
                             ['idarticulo' =>  $det->idarticulo, 'tipo_movimiento' => 'Salida' ,'motivo' => 'Traslado', 'cantidad' => $det->cantidad, 'estado' => 'Activo' , 'fecha_mov' => $mytime3->toDateTimeString(),'idsucursal' =>$emisor,'nota'=>'-']);
                           }




            }else{ //el emisor no era almacen

                 $detalle=DB::table('detalle_traslado as dt')
                ->where('dt.idnotificacion_tras','=',$id)
                ->get();

                foreach($detalle as $det){

                       $act= $det->cantidad;
                       $ant=DB::table('traslado as k')
                        ->select('k.stock','k.precio_detalle')
                       ->where('k.idsucursal','=',$emisor)
                       ->where('k.idarticulo','=',$det->idarticulo)
                       ->get();

                         foreach($ant as $a){
                            $antes=$a->stock;
                            $precio_det=$a->precio_detalle;
                        }

                       $newstock=$antes-$act;

                        DB::table('traslado as tr')
                       ->where('tr.idsucursal','=',$emisor)
                       ->where('tr.idarticulo','=',$det->idarticulo)
                       ->update(['tr.stock' => $newstock]);

                       DB::table('traslado')->insert(
                        ['idarticulo' =>  $det->idarticulo, 'stock' => $det->cantidad, 'estado' => 'Activo' , 'fecha_hora' => $mytime3->toDateTimeString(),'idsucursal' =>$idsucursal,'precio_venta'=>$det->precio_venta,'stockmin'=>'0','cantidad_volumen1'=>$det->cantidad_volumen1,'precio_mayor1'=>$det->precio_mayor1,
                        'cantidad_volumen2'=>$det->cantidad_volumen2,'precio_mayor2'=>$det->precio_mayor2,'cantidad_volumen3'=>$det->cantidad_volumen3,'precio_mayor3'=>$det->precio_mayor3,'cantidad_detalle'=>'0','precio_detalle'=>$precio_det]);

                      //Agregando Movimiento para mi
                           DB::table('movimiento')->insert(
                             ['idarticulo' => $det->idarticulo, 'tipo_movimiento' => 'Entrada' ,'motivo' => 'Inventario Inicial', 'cantidad' => $det->cantidad, 'estado' => 'Activo' , 'fecha_mov' => $mytime3->toDateTimeString(),'idsucursal' =>$idsucursal,'nota'=>'-']);

                          //Agregando movimiento para él
                            DB::table('movimiento')->insert(
                             ['idarticulo' =>  $det->idarticulo, 'tipo_movimiento' => 'Salida' ,'motivo' => 'Traslado', 'cantidad' => $det->cantidad, 'estado' => 'Activo' , 'fecha_mov' => $mytime3->toDateTimeString(),'idsucursal' =>$emisor,'nota'=>'-']);
                           }


            }//fin de ver si  el emisor es almacen o no

         Alert::success('En buena hora, los articulos nuevos fuerón agregados, recuerda modificarlos si son necesarios', 'Mensaje del Sistema')->persistent("Close");

        } //fin si lo rechazo si o no

        //Entonces lo acepta
          $noti=Notificacion_Traslado::findOrFail($id);
             $noti->estado='Aceptado';
             $noti->update();


    } //fin si era nuevo o no



        return Redirect::to('traslados/entrantes');
    }


        public function destroy($id_act)
    {
        DB::table('detalle_traslado')->where('iddetalle_traslado', '=', $id_act)->delete();


          Alert::success('Se eliminó correctamente el articulo asociado al traslado', 'Mensaje del Sistema')->persistent("Close");
        return Redirect::to('traslados/realizados');
    }

}
