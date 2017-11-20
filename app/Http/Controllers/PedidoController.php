<?php

namespace sisVentas\Http\Controllers;

use Illuminate\Http\Request;
use sisVentas\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Auth;
use Alert;
use Carbon\Carbon;
use Response;
use sisVentas\Articulo;
use sisVentas\Traslado;
use Illuminate\Support\Collection;
use DB;


class PedidoController extends Controller
{
    //AQUI INTERACTUARA AJAX

     public function __construct()
    {
        $this->middleware('auth');

    }

     public function byStock0($id1,$id2){

         //que el id1 es el articulo que se ha seleccionado
         //el id2 es la sucursal seleccionada, con ello veremos si existe dicho
         //articulo en esa sucursal
         //escuchando occult nine op :D si se puede, esta funcion es para ambas pq al fin al cabo ambos em piden el stock del otro la cual sera el relativo :D

         //primero veremos si estamos en almacen, para ver si existe o no
         $idsucursal=Auth::user()->id_s;

         if($id2==3)
         {
             //los articulos siempre existen aqui, desde mi sucursal
             $consulta=Articulo::where('idarticulo','=',$id1)->get();
                foreach($consulta as $con){
                            $sustock=$con->stock;
                          }

                        $referencial=DB::table('notificacion_traslado as nt')
                        ->join('detalle_traslado as dt','dt.idnotificacion_tras','=','nt.idnotificacion_traslado')
                        ->select(DB::raw('SUM(dt.cantidad) as suma'),'dt.idarticulo')
                        ->where('nt.idemisor','=',$id2)
                        ->where('nt.estado','=','En espera')
                        ->groupBy('dt.idarticulo')
                        ->having('dt.idarticulo','=',$id1)
                        ->get();

                        if(count($referencial)>1){
                          foreach($referencial as $ref){
                              $mostrar=$referencial->suma;
                          }
                          $referencia=$sustock-$mostrar;
                        }else{
                          $mostrar=0;
                          $referencia=$sustock-$mostrar;
                        }

                        $consulta2=Traslado::where('idsucursal','=',$idsucursal)->where('idarticulo','=',$id1)->get();

                         foreach($consulta2 as $con2){
                             $mistock=$con2->stock;
                         }





         }else{
             //verificando si existe, reduciendo codigo, recordando que el stock es sacado desde la condicional Articulo si el emisor es almacen, else desde traslado
              $consulta=Traslado::where('idsucursal','=',$id2)->where('idarticulo','=',$id1)->get();
                 foreach($consulta as $con){
                             $sustock=$con->stock;
                    }

              //verificando :v
                     if(isset($sustock)==false){
                           $referencia='mensaje';
                           $mistock='no';
                     }else{ //porq el articulo a pedir existe
                       $referencial=DB::table('notificacion_traslado as nt')
                       ->join('detalle_traslado as dt','dt.idnotificacion_tras','=','nt.idnotificacion_traslado')
                       ->select(DB::raw('SUM(dt.cantidad) as suma'),'dt.idarticulo')
                       ->where('nt.idemisor','=',$id2)
                       ->where('nt.estado','=','En espera')
                       ->groupBy('dt.idarticulo')
                       ->having('dt.idarticulo','=',$id1)
                       ->get();

                           if(count($referencial)>1){
                                 $mostrar=0;
                                 $referencia=$sustock;
                               //para dar mi stock tengo q saber donde estoy pz
                               //**********************************************
                               foreach($referencial as $ref){
                                  $mostrar=$referencial->suma;
                                }
                                $referencia=$sustock-$mostrar;
                              //***********************************************
                               if($idsucursal==3){
                                   //estoy en almacen ok :D
                                    $consulta2=Articulo::where('idarticulo','=',$id1)->get();

                                     foreach($consulta2 as $con2){
                                         $mistock=$con2->stock;
                                     }

                               }else{ //no estaba en almacen

                                $consulta2=Traslado::where('idsucursal','=',$idsucursal)->where('idarticulo','=',$id1)->get();

                                 foreach($consulta2 as $con2){
                                     $mistock=$con2->stock;
                                 }

                               }//fin para mandar mi stock


                           }else{ //else de si referencial es mayor que 1
                             //************************************************
                             $mostrar=0;
                             $referencia=$sustock-$mostrar;
                            //************************************************
                               if($idsucursal==3){
                                   //estoy en almacen ok :D
                                    $consulta2=Articulo::where('idarticulo','=',$id1)->get();

                                     foreach($consulta2 as $con2){
                                         $mistock=$con2->stock;
                                     }

                               }else{ //no estaba en almacen

                                $consulta2=Traslado::where('idsucursal','=',$idsucursal)->where('idarticulo','=',$id1)->get();

                                 foreach($consulta2 as $con2){
                                     $mistock=$con2->stock;
                                 }

                               }//fin para mandar mi stock


                           }
                     }

         } //fin para calcular todo, al fin :v


          return([$mistock,$referencia]);
     }

}
