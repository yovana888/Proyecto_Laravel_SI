<?php

namespace sisVentas\Http\Controllers;


use Illuminate\Http\Request;
use sisVentas\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Auth;
use Alert;
use Carbon\Carbon;
use Response;
use sisVentas\Traslado;
use sisVentas\DetalleArticulo;
use sisVentas\Articulo2;
use Illuminate\Support\Collection;
use DB;
use sisVentas\Notificacion_Traslado;
use sisVentas\DetalleNotTraslado;
use sisVentas\Http\Requests\NotificacionTraFormRequest;

class TrasladoController extends Controller
{
    
     public function __construct()
    {
        $this->middleware('auth');
          
    }
         public function byArticulos($id){
        
        $idsucursal=Auth::user()->id_s;
        $idk=$id;
        if( Auth::user()->s_actual=='Almacen'){
            //ver si existe en la tabla articulo +++
           
           return (DB::table('traslado as t')
                ->join('detalle_articulo as da','da.iddetalle_articulo','=','t.idarticulo')
                ->join('articulo as art','art.idarticulo','=','da.idarticulo')
                ->select(DB::raw('CONCAT(da.codigo, " ",art.nombre, " color ",da.etiqueta) AS articulo'),'da.iddetalle_articulo','da.UN1','da.UN2','da.tam_nro1','da.tam_nro2','t.stock')
                ->where('t.idsucursal','=',$idk)
                ->get());
               
        }else{
            //porq no estoy en almacen central, entonces veo si el destino es el central :v o no ?
            if($idk==3){ //tengo q mostrar mis articulos ya q estos si o si estan almacen
            return (DB::table('traslado as t')
                ->join('detalle_articulo as da','da.iddetalle_articulo','=','t.idarticulo')
                ->join('articulo as art','art.idarticulo','=','da.idarticulo')
                ->select(DB::raw('CONCAT(da.codigo, " ",art.nombre, " color ",da.etiqueta) AS articulo'),'da.iddetalle_articulo','da.UN1','da.UN2','da.tam_nro1','da.tam_nro2','t.stock')
                ->where('t.idsucursal','=',$idsucursal)
                ->get());
                
                
            }else{ //verificando entre la misma tabla traslado, en otras palabras paso los articulos de destino :v 
                
                  return (DB::table('traslado as t')
                ->join('detalle_articulo as da','da.iddetalle_articulo','=','t.idarticulo')
                ->join('articulo as art','art.idarticulo','=','da.idarticulo')
                ->select(DB::raw('CONCAT(da.codigo, " ",art.nombre, " color ",da.etiqueta) AS articulo'),'da.iddetalle_articulo','da.UN1','da.UN2','da.tam_nro1','da.tam_nro2','t.stock')
                ->where('t.idsucursal','=',$idk)
                ->get());
            
            }
            
        }
    
       
    }
    public function byArticulos0($id){
        
             $idsucursal=Auth::user()->id_s;
             $idk=$id;
        if($idk==3 ){
       
            

//extraigo directo el stock, sin importar q yo no tenga :v de alli se en el articulo no mas :v 
                 return (DB::table('detalle_articulo as da')
                ->join('articulo as art','art.idarticulo','=','da.idarticulo')
                ->select(DB::raw('CONCAT(da.codigo, " ",art.nombre, " color ",da.etiqueta) AS articulo'),'da.iddetalle_articulo','da.UN1','da.UN2','da.tam_nro1','da.tam_nro2')
                ->groupBy('da.iddetalle_articulo')
                ->havingRaw('SUM(da.stockmin-da.num_stock_gn) >= 0')
                ->get());
            
        }else{
         
             //ES PORQUE ESTOY EN SUCURSAL
                
                return(DB::table('traslado as t')
                ->join('detalle_articulo as da','da.iddetalle_articulo','=','t.idarticulo')
                ->join('articulo as art','art.idarticulo','=','da.idarticulo')
                ->select(DB::raw('CONCAT(da.codigo, " ",art.nombre, " color ",da.etiqueta) AS articulo'),'da.iddetalle_articulo','da.UN1','da.UN2','da.tam_nro1','da.tam_nro2')
                ->where('t.idsucursal','=',$id)
                ->groupBy('t.idtraslado')
                ->havingRaw('SUM(t.stockmin-t.stock) >= 0') 
                ->get());
        }
    
       
    }
    
    public function byStock($id1,$id2){
          $idsucursal=Auth::user()->id_s;
        //id1 corresponde al idarticulo, mi stock
          if(Auth::user()->s_actual=='Almacen'){
            //esto es para sacar mi stock actual con respectoa ese articulo 
              
            $as=DetalleArticulo::where('iddetalle_articulo','=',$id1)->get();
             foreach($as as $a){
                     $us1=$a->num_stock_gn;
            }
              
          }else{
              
               $as=Articulo2::where('idsucursal','=',$idsucursal)->where('idarticulo','=',$id1)->get();
                 foreach($as as $a){
                             $us1=$a->stock;
                    }
          }
              
         //id2 corresponde a la sucursales en la tabla traslado, pero el almacen es de id==3
        //entonces hay q hacer un if la cual permita ver, si sacamos el stock de la tabla articulo o traslado
        if($id2==3){
            $bs=DetalleArticulo::where('iddetalle_articulo','=',$id1)->get();
             foreach($bs as $b){
                     $us2=$b->num_stock_gn;
            }
        }else{
             $bs=Articulo2::where('idsucursal','=',$id2)->where('idarticulo','=',$id1)->get();
             foreach($bs as $b){
                     $us2=$b->stock;
            }
            
          
        }
        
          //puede que yo no tenga el articulo
             if(isset($us1)==false){
                       $us1='mensaje'; 
                    }
        
        return([$us1,$us2]);
    }
    
    //OTRO ++ AAAA >:V ||| ESCUCHANDO EL END. DE SERVAMP :D ESO MOTIVA
    
     public function byStock0($id10,$id20){
        $idsucursal=Auth::user()->id_s;
         
         if(Auth::user()->s_actual=='Almacen'){
             //mi stock desde almacen
              $as=DetalleArticulo::where('iddetalle_articulo','=',$id10)->get();
              foreach($as as $a){
                     $us1=$a->num_stock_gn;
              }
             
         }else{
        
        //id1 corresponde al idarticulo, mi stock es lo q mando :v primero 
          $as=Articulo2::where('idsucursal','=',$idsucursal)->where('idarticulo','=',$id10)->get();
                 foreach($as as $a){
                             $us1=$a->stock;
                    }
         }
       
        
        
         //id2 corresponde a la sucursales en la tabla traslado, pero el almacen es de id==3
        //entonces hay q hacer un if la cual permita ver, si sacamos el stock de la tabla articulo o traslado
        if($id20==3){
           $bs=DetalleArticulo::where('iddetalle_articulo','=',$id10)->get();
             foreach($bs as $b){
                     $us2=$b->num_stock_gn;
            }
        }else{
             $bs=Articulo2::where('idsucursal','=',$id20)->where('idarticulo','=',$id10)->get();
             foreach($bs as $b){
                     $us2=$b->stock;
            }
            
          
        }
        
          //puede que yo no tenga el articulo
             if(isset($us1)==false){
                       $us1='mensaje'; 
                    }
        
        return([$us1,$us2]);
    }
    
    
    //wtf ya me aburri aaa q sera con pedidos :v (mejor me suicido...deja de quejarte y hazlo T.T)
    
    public function byStockk($idk1,$idk2){
        $idsucursal=Auth::user()->id_s;
         
         if(Auth::user()->s_actual=='Almacen'){
             //mi stock desde almacen
             $as=DetalleArticulo::where('iddetalle_articulo','=',$idk1)->get();
             foreach($as as $a){
                     $us1=$a->num_stock_gn;
                     $pv=$a->precio_normal_u;
                     $cv1=$a->cantidad_vol1;
                     $pu1=$a->precio_vol1;
                     $cv2=$a->cantidad_vol2;
                     $pu2=$a->precio_vol2;
                     $cv3=$a->cantidad_vol3;
                     $pu3=$a->precio_vol3;

            }
             
             
         }else{
        
        //id1 corresponde al idarticulo, mi stock es lo q mando :v primero 
         $as=Articulo2::where('idsucursal','=',$idsucursal)->where('idarticulo','=',$idk1)->get();
         foreach($as as $a){
                     $us1=$a->stock;
                     $pv=$a->precio_venta;
                     $cv1=$a->cantidad_volumen1;
                     $pu1=$a->precio_mayor1;
                     $cv2=$a->cantidad_volumen2;
                     $pu2=$a->precio_mayor2;
                     $cv3=$a->cantidad_volumen3;
                     $pu3=$a->precio_mayor3;
            }
         }
       
        
        
         //id2 corresponde a la sucursales en la tabla traslado, pero el almacen es de id==3
        //entonces hay q hacer un if la cual permita ver, si sacamos el stock de la tabla articulo o traslado
        if($idk2==3){
            $bs=DetalleArticulo::where('iddetalle_articulo','=',$idk1)->get();
             foreach($bs as $b){
                     $us2=$b->stock;
            }
        }else{
             $bs=Articulo2::where('idsucursal','=',$idk2)->where('idarticulo','=',$idk1)->get();
             foreach($bs as $b){
                     $us2=$b->stock;
            }
            
          
        }
        
          //puede que yo no tenga el articulo, y es solo alli que se podra agregar el articulo nuevo 
             if(isset($us2)==false){
                       $us2='mensaje'; 
                    }
        
        return([$us1,$us2,$pv,$cv1,$pu1,$cv2,$pu2,$cv3,$pu3]);
    }
    
 
}


