<?php

namespace sisVentas\Http\Controllers;
use Illuminate\Http\Request;
use sisVentas\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sisVentas\Http\Requests\VentaFormRequest;
use sisVentas\Venta;
use sisVentas\DetalleVenta;
use sisVentas\Persona;
use sisVentas\Credito;
use sisVentas\Movimiento;
use sisVentas\Sucursal;
use sisVentas\User;
use DB;
use Fpdf;
use \PDF;
use DomPdf;
use Auth;
use Alert;

use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;

class VentaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
         $sucursal=Auth::user()->id_s;
        if ($request)
        {
           $query=trim($request->get('searchText'));
           $ventas=DB::table('venta as v')
            ->join('persona as p','v.idcliente','=','p.idpersona')
            ->join('detalle_venta as dv','v.idventa','=','dv.idventa')
            ->select('v.idventa','v.fecha_hora','p.nombre','v.tipo_comprobante','v.serie_comprobante','v.num_comprobante','v.impuesto','v.estado','v.total_venta','v.tipo_venta','v.num_guia','v.serie_guia','v.idsucursal')
            ->where('v.idsucursal','=',$sucursal)
            ->where('v.num_comprobante','LIKE','%'.$query.'%')
            ->orwhere('v.tipo_comprobante','LIKE','%'.$query.'%')
            ->orwhere('p.nombre','LIKE','%'.$query.'%')
            ->orderBy('v.idventa','desc')
            ->groupBy('v.idventa','v.fecha_hora','p.nombre','v.tipo_comprobante','v.serie_comprobante','v.num_comprobante','v.impuesto','v.estado','v.total_venta','v.tipo_venta','v.num_guia','v.serie_guia')
            ->paginate(7);
            return view('ventas.venta.index',["ventas"=>$ventas,"searchText"=>$query]);

        }
    }
    public function create()
    {
         
        $sucursal=Auth::user()->id_s;
    	$personas=DB::table('persona as p')
        ->where('p.idsucursal','=',$sucursal)
        ->where('tipo_persona','=','Cliente')->get();
        
        
        $empleados=DB::table('users as u')
        ->join('user_sucursal as us','us.iduser','=','u.id')
        ->select('u.dni','u.id')
        ->where('us.idsucursal','=',$sucursal)
        ->where('us.estado','=','Activo')->get();
        
        $articulos =DB::table('traslado as t')
        ->join('articulo as art','t.idarticulo','=','art.idarticulo')
         ->select(DB::raw('CONCAT(art.codigo, " ",art.nombre) AS articulo'),'t.idarticulo','t.stock','t.precio_venta','t.cantidad_volumen','t.precio_mayor')
          ->where('t.idsucursal','=',$sucursal)
          ->where('t.estado','=','Activo')
          ->where('t.stock','>','0')
          ->get();
        
    	
        return view("ventas.venta.create",["personas"=>$personas,"articulos"=>$articulos,"empleados"=>$empleados]);
    }
    
   

     public function store (VentaFormRequest $request)
    {
          try{
    
        	$venta=new Venta;
	        $venta->idcliente=$request->get('idcliente');
            $venta->iduser=$request->get('id');
	        $venta->tipo_comprobante=$request->get('tipo_comprobante');
            //TANTO PARA NUMERO Y SERIE COMPROBANTE AUTOGENERADO luego
            $tip=$request->get('tipo_comprobante');
            //*******************************************************
            $v1=$request->get('c_a');
            //if mayor
           if($v1=='1'){
                 if($tip=='Boleta/Guía de R.'||$tip=='Boleta'){
                     
                    $ursula0=Venta::where('tipo_comprobante','=','Boleta/Guía de R.')->get();
                    foreach($ursula0 as $ur0){
                    $max0=$ur0->idventa;
                    }
                     
                  
                    $ursula1=Venta::where('tipo_comprobante','=','Boleta')->get();
                    foreach($ursula1 as $ur1){
                    $max1=$ur1->idventa;
                    }
                     
                    if(isset($max0)==false){
                       $max0=0; 
                    }else if(isset($max1)==false){
                         $max1=0; 
                    }

                     
                
                        if($max0>$max1){
                            //entonces es con este registro q haremos el incremento ok :D, busquemos
                             $on=Venta::where('idventa','=',$max0)->first();
                
                               //aqui
                            
                                $on1=$on->serie_comprobante;
                                $on2=$on->num_comprobante;
                                $on3=$on->intnumero;
                                $incre=$on3+1;
                                $long_num1=strlen($on2);
                                $long_num2=strlen($on3);
                                $cant_0_r=$long_num1-$long_num2;

                                $digitos=0;
                                $base=0;
                                $cont=0;

                                  while($cont < $cant_0_r-1) 
                                            {

                                                $digitos=$digitos . $base;
                                                $cont++;
                                            }
                                //volvemos a concatenar
                                $new=$digitos . $incre;
                                $venta->num_comprobante=$new;
                                $venta->serie_comprobante=$on1;
                                $venta->intnumero=$incre;
                        }
                        else   if($max0<$max1){
                                 $on=Venta::where('idventa','=',$max1)->first();
                
                               //aqui
                            
                                $on1=$on->serie_comprobante;
                                $on2=$on->num_comprobante;
                                $on3=$on->intnumero;
                                $incre=$on3+1;
                                $long_num1=strlen($on2);
                                $long_num2=strlen($on3);
                                $cant_0_r=$long_num1-$long_num2;

                                $digitos=0;
                                $base=0;
                                $cont=0;

                                  while($cont < $cant_0_r-1) 
                                            {

                                                $digitos=$digitos . $base;
                                                $cont++;
                                            }
                                //volvemos a concatenar
                                $new=$digitos . $incre;
                                $venta->num_comprobante=$new;
                                $venta->serie_comprobante=$on1;
                                $venta->intnumero=$incre;  
                        }else{
                             $venta->serie_comprobante=$request->get('serie_comprobante');
                                $venta->num_comprobante=$request->get('num_comprobante');
                                $convertir=$request->get('num_comprobante');
                                $int = (int)$convertir;
                                $venta->intnumero=$int; 
                        }
                
               
                     
                 }else if($tip=='Boleta/Guía de R.'||$tip=='Boleta'){
                     //o es FACTURA O FACTURA/GUIA
                     $ursula0=Venta::where('tipo_comprobante','=','Factura/Guía de R.')->get();
                    foreach($ursula0 as $ur0){
                        $max0=$ur0->idventa;
                    }

                    $ursula1=Venta::where('tipo_comprobante','=','Factura')->get();
                    foreach($ursula1 as $ur1){
                    $max1=$ur1->idventa;
                    }
                     
                    if(isset($max0)==false){
                       $max0=0; 
                    }else if(isset($max1)==false){
                         $max1=0; 
                    }

                     
                
                        if($max0>$max1){
                            //entonces es con este registro q haremos el incremento ok :D, busquemos
                             $on=Venta::where('idventa','=',$max0)->first();
                
                               //aqui
                            
                                $on1=$on->serie_comprobante;
                                $on2=$on->num_comprobante;
                                $on3=$on->intnumero;
                                $incre=$on3+1;
                                $long_num1=strlen($on2);
                                $long_num2=strlen($on3);
                                $cant_0_r=$long_num1-$long_num2;

                                $digitos=0;
                                $base=0;
                                $cont=0;

                                  while($cont < $cant_0_r-1) 
                                            {

                                                $digitos=$digitos . $base;
                                                $cont++;
                                            }
                                //volvemos a concatenar
                                $new=$digitos . $incre;
                                $venta->num_comprobante=$new;
                                $venta->serie_comprobante=$on1;
                                $venta->intnumero=$incre;
                        }
                        else  if($max0<$max1){
                                 $on=Venta::where('idventa','=',$max1)->first();
                
                               //aqui
                            
                                $on1=$on->serie_comprobante;
                                $on2=$on->num_comprobante;
                                $on3=$on->intnumero;
                                $incre=$on3+1;
                                $long_num1=strlen($on2);
                                $long_num2=strlen($on3);
                                $cant_0_r=$long_num1-$long_num2;

                                $digitos=0;
                                $base=0;
                                $cont=0;

                                  while($cont < $cant_0_r-1) 
                                            {

                                                $digitos=$digitos . $base;
                                                $cont++;
                                            }
                                //volvemos a concatenar
                                $new=$digitos . $incre;
                                $venta->num_comprobante=$new;
                                $venta->serie_comprobante=$on1;
                                $venta->intnumero=$incre;  
                        }else{
                             $venta->serie_comprobante=$request->get('serie_comprobante');
                                $venta->num_comprobante=$request->get('num_comprobante');
                                $convertir=$request->get('num_comprobante');
                                $int = (int)$convertir;
                                $venta->intnumero=$int; 
                        }
                
                 }else{
                        //PORQUE ES TICKET
                     
                        $ursula=Venta::where('tipo_comprobante','=','Ticket')->get();
                        foreach($ursula as $ur){
                            $max1=$ur->idventa;
                        }
                        $on=Venta::where('idventa','=',$max1)->first();

                        $on1=$on->serie_comprobante;
                        $on2=$on->num_comprobante;
                        $on3=$on->intnumero;
                        $incre=$on3+1;
                        $long_num1=strlen($on2);
                        $long_num2=strlen($on3);
                        $cant_0_r=$long_num1-$long_num2;

                        $digitos=0;
                        $base=0;
                        $cont=0;

                          while($cont < $cant_0_r-1) 
                                    {

                                        $digitos=$digitos . $base;
                                        $cont++;
                                    }
                        //volvemos a concatenar
                        $new=$digitos . $incre;
                        $venta->num_comprobante=$new;
                        $venta->serie_comprobante=$on1;
                        $venta->intnumero=$incre;

                        }
                     
                 
               
               
           }else{
                $venta->serie_comprobante=$request->get('serie_comprobante');
                $venta->num_comprobante=$request->get('num_comprobante');
                $convertir=$request->get('num_comprobante');
                $int = (int)$convertir;
                $venta->intnumero=$int;  
           }
         
           
           
    
             //******************GUIA DE REMISION AUTOGENERADO*****************
            $v2=$request->get('g_a');
         
            if($v2=='1'){
                 if($tip=='Boleta/Guía de R.'||$tip=='Factura/Guía de R.'){
                     
                    $ursula2=Venta::where('tipo_comprobante','=','Boleta/Guía de R.')->get();
                    foreach($ursula2 as $ur2){
                        $max2=$ur2->idventa;
                    }

                    $ursula3=Venta::where('tipo_comprobante','=','Factura/Guía de R.')->get();
                    foreach($ursula3 as $ur3){
                    $max3=$ur3->idventa;
                    }
                  
                     if(isset($max2)==false){
                       $max2=0; 
                    }else if(isset($max3)==false){
                         $max3=0; 
                    }

                        if($max2>$max3){
                            //entonces es con este registro q haremos el incremento ok :D, busquemos
                             $oni=Venta::where('idventa','=',$max2)->first();
                
                                $oni1=$oni->serie_comprobante;
                                $oni2=$oni->num_comprobante;
                                $oni3=$oni->intnumero;
                                $increi=$oni3+1;
                                $long_num1i=strlen($oni2);
                                $long_num2i=strlen($oni3);
                                $cant_0_ri=$long_num1i-$long_num2i;

                                $digitosi=0;
                                $basei=0;
                                $conti=0;

                                  while($conti < $cant_0_ri-1) 
                                            {

                                                $digitosi=$digitosi . $basei;
                                                $conti++;
                                            }
                                //volvemos a concatenar
                               $newi=$digitosi . $increi;
                                $venta->num_guia=$newi;
                                $venta->serie_guia=$oni1;
                                $venta->intnumero_guia=$increi;

                        }
                        else  if($max2<$max3){
                                    $oni=Venta::where('idventa','=',$max2)->first();
                
                                $oni1=$oni->serie_comprobante;
                                $oni2=$oni->num_comprobante;
                                $oni3=$oni->intnumero;
                                $increi=$oni3+1;
                                $long_num1i=strlen($oni2);
                                $long_num2i=strlen($oni3);
                                $cant_0_ri=$long_num1i-$long_num2i;

                                $digitosi=0;
                                $basei=0;
                                $conti=0;

                                  while($conti < $cant_0_ri-1) 
                                            {

                                                $digitosi=$digitosi . $basei;
                                                $conti++;
                                            }
                                //volvemos a concatenar
                                $newi=$digitosi . $increi;
                                $venta->num_guia=$newi;
                                $venta->serie_guia=$oni1;
                                $venta->intnumero_guia=$increi;
                        }else{
                            //primier 
                             $venta->num_guia=$request->get('num_guia');
                             $venta->serie_guia=$request->get('serie_guia');
                             $convertir2=$request->get('num_guia');
                             $int2 = (int)$convertir2;
                             $venta->intnumero_guia=$int2;
                        }
                
               
                     
                 }else{
                     //no hace nada pq este button se oculta si no es ninguno 
                     //XD :v :v 
                 }
            }else{
                //lo q hace es q es el primer registro o quiere cambiar la serie
                 $venta->num_guia=$request->get('num_guia');
                 $venta->serie_guia=$request->get('serie_guia');
                 $convertir2=$request->get('num_guia');
                 $int2 = (int)$convertir2;
                 $venta->intnumero_guia=$int2;
            }
         
            //CREO QUE YA T.T :v 
            
            ////////////////////////////////////////////////////
         
          
            $venta->total_venta=$request->get('total_venta');
	        $tot=$request->get('total_venta');
          //  $venta->importe=$request->get('yop');
             $ban=1.18/1.36;
            
             $ban2=$ban*$tot;
             $ban3=round($ban2, 2);
              
            
           
              
              
	        $mytime = Carbon::now('America/Lima');
	        $venta->fecha_hora=$mytime->toDateTimeString();
	        if ($request->get('impuesto')=='1')
            {
                $venta->impuesto='18';
                  $venta->importe=$ban3;
            }
            else
            {
                $venta->impuesto='0';
                  $venta->importe=$request->get('total_venta');
            }
            //ESTADO EN SI SON 4:TIPOS Aceptado, Anulado, Por Cobrar, Cancelado
            //como es nueva venta solo son 2 posibles Aceptado y Por cobrar, para ello se
            //verifica el valor de radio buton
            $verificacion=$request->get('radio');
            
            if($verificacion=='contado'){
                $venta->estado='Aceptado';
                $venta->tipo_venta='Contado';
                 $venta->efectivo=$request->get('ef');
                
                $bl=$request->get('vueltoya');
                if($bl==''){
                 $venta->vuelto=0;  
                }
                else{
                   $venta->vuelto=$bl;    
                }
            
            }else{
                $venta->estado='Por Cobrar';
                $venta->tipo_venta='Crédito';
                 $venta->efectivo=$request->get('cancel');
                $venta->vuelto=0;  
                //ahora en si hay q actualizar la tabla credito :D, pero primero hay q guardar 
            }
            
            //Ahora veremos para el resto de los campos
           
            
            
            $bl2=$request->get('otro');
         
             if($bl2==''){
             $venta->otros='-';  
            }
            else{
             $venta->otros=$bl2;   
            }
            $venta->observacion=$request->get('observacion');
            $venta->fecha_ven=$request->get('fecha_ven');
            $venta->orden=$request->get('orden');
            $venta->referencia=$request->get('referencia');
            $venta->cambio=$request->get('cambio');
            $venta->p_partida=$request->get('p_partida');
            $venta->p_llegada=$request->get('p_llegada');
            $venta->fecha_guia=$request->get('fecha_guia');
            $venta->ruc_t=$request->get('ruc_t');
            $venta->non_t=$request->get('non_t');
            $venta->m_p=$request->get('m_p');
            $venta->licencia=$request->get('licencia');
            $venta->motivo=$request->get('motivo');
            $venta->tarjeta=$request->get('tarjeta');
            $venta->idsucursal=Auth::user()->id_s;
            //AHORA se verificara el tipo de pago :c
            $ck1=$request->get('tipo1');
            $ck2=$request->get('tipo2');
            
            if($ck1=='1' and $ck2=='1'){
                $venta->tipo_pago='Efectivo/Tarjeta';
            }else  if($ck1=='1'){
                $venta->tipo_pago='Efectivo';
            }else if($ck2=='1'){
                $venta->tipo_pago='Tarjeta';
            }else{
                $venta->tipo_pago='Efectivo';
            }
            
            //
	        $venta->save();
            $sucursal_a=Auth::user()->id_s; //en si con ello obtengo la sucursal a la cual se agregara el movimiento y credito en caso de que hubiese :D
         
            //Ahora tenemos q consultar el ultimo registro
            /*$number=DB::table('venta')
            ->select(DB::raw('MAX(idventa) as g'))->first();
            $maxes=$number->g;*/
            $maxes=$venta->idventa; //probamos ello en vez del max para redicir coste
            //Ahora en si lo buscaremos el estado de este registro
            $est=DB::table('venta')
            ->select('estado as neko')
            ->where('idventa','=',$maxes)
            ->first();
            
            $llenar=$est->neko;
            $mytime2 = Carbon::now('America/Lima');
            //obtenemos el valor de monto
            $cancel = $request->get('cancel');
            $cuenta=$tot-$cancel;
            $fecha_px=$request->get('fecha_p');
            if($llenar=='Por Cobrar'){
                //Entonces nos vamos a la tabla credito
               
                
               $credito_g=new Credito;
               $credito_g->idventa=$maxes;
               $credito_g->total=$tot;
               $credito_g->fecha_px=$fecha_px;
               $credito_g->idsucursal=$sucursal_a;
               $credito_g->resto= $cuenta;
               $credito_g->estado='Por Cobrar';
               $credito_g->save();
                
               //AHORA DETALLE DE CREDITO
            
                DB::table('detalle_credito')->insert(
                ['idcredito' => $credito_g->idcredito, 'fecha_pago' => $mytime2->toDateTimeString(),'monto' => $cancel]
                );
            
               
            }else
            {
                //que no haga nada, ya q esta Aceptado
            }
           
            //
            
	        $idarticulo = $request->get('idarticulo');
	        $cantidad = $request->get('cantidad');
	        $descuento = $request->get('descuento');
	        $precio_venta = $request->get('precio_venta'); //por si le dio descuento

	        $cont = 0;

	        while($cont < count($idarticulo)){
	            $detalle = new DetalleVenta();
	            $detalle->idventa= $venta->idventa; 
	            $detalle->idarticulo= $idarticulo[$cont];
                $sucursal_a=Auth::user()->id_s; 
                $valor=$cantidad[$cont]*$precio_venta[$cont]; 
                //Ahora el movimiento
               $mytime3 = Carbon::now('America/Lima');
                DB::table('movimiento')->insert(
                ['idarticulo' => $idarticulo[$cont], 'tipo_movimiento' => 'Salida' ,'motivo' => 'Venta', 'cantidad' => $cantidad[$cont], 'estado' => 'Activo' , 'fecha_mov' => $mytime3->toDateTimeString(),'idsucursal' =>$sucursal_a,'nota'=>'-']);  
                //con descuento*art
                //aaa pero falto actualizar articulo pz pero hay stok pz 
                
	            $detalle->cantidad= $cantidad[$cont];
	            $detalle->descuento= $descuento[$cont];
	            $detalle->precio_venta= $precio_venta[$cont];
                $detalle->subtotal=$cantidad[$cont]*$precio_venta[$cont];
	            $detalle->save();
	            $cont=$cont+1;  
                
                
                       
	        }
                Alert::success('Venta registrada correctamente', 'Mensaje del Sistema')->persistent("Close");

          }catch(\Exception $e)
            {
                DB::rollback();
                 Alert::warning('Sucedio algo inesperado, venta no registrada', 'Mensaje del Sistema')->persistent("Close");

            }

        return Redirect::to('ventas/venta');
    }

    
    

    
    
    public function show($id) //ese is es el id_venta de la tabla venta
    {
    	$venta=DB::table('venta as v')
            ->join('persona as p','v.idcliente','=','p.idpersona')
            ->join('detalle_venta as dv','v.idventa','=','dv.idventa')
            ->select('v.idventa','v.fecha_hora','p.nombre','v.tipo_comprobante','v.serie_comprobante','v.num_comprobante','v.impuesto','v.estado','v.total_venta')
            ->where('v.idventa','=',$id)
            ->first();
        
        
        $detalles=DB::table('detalle_venta as d')
             ->join('articulo as a','d.idarticulo','=','a.idarticulo')
             ->select('a.nombre as articulo','d.cantidad','d.descuento','d.precio_venta')
             ->where('d.idventa','=',$id)
             ->get();
        return view("ventas.venta.show",["venta"=>$venta,"detalles"=>$detalles]);
    }

    public function destroy($id)
    {
    	$venta=Venta::findOrFail($id);
        $venta->Estado='Anulado';
        $venta->update();
        return Redirect::to('ventas/venta');
    }
 
    public function reporte1(){
        
          $ventas=DB::table('venta as v')
            ->join('persona as p','v.idcliente','=','p.idpersona')
            ->join('detalle_venta as dv','v.idventa','=','dv.idventa')
            ->select('v.idventa','v.fecha_hora','p.nombre','v.tipo_comprobante','v.serie_comprobante','v.num_comprobante','v.impuesto','v.estado','v.total_venta','v.tipo_venta','v.num_guia','v.serie_guia')
            ->orderBy('v.idventa','desc')
            ->groupBy('v.idventa','v.fecha_hora','p.nombre','v.tipo_comprobante','v.serie_comprobante','v.num_comprobante','v.impuesto','v.estado')
            ->get();
        
       // $ventas = Venta::all();
        $pdf = \PDF::loadView('ventas.venta.vista', ["ventas"=>$ventas]);
        //return $pdf->download('archivo.pdf');
        return $pdf->stream();
    }
    
    public  function factura($id){
        
         $ventas=DB::table('venta as v')
            ->join('persona as p','v.idcliente','=','p.idpersona')
            ->join('detalle_venta as dv','v.idventa','=','dv.idventa')
            ->join('users as u','v.iduser','=','u.id')
             ->join('user_sucursal as us','us.iduser','=','u.id')
            ->join('sucursal as s','us.idsucursal','=','s.idsucursal')
            ->select('v.idventa','v.fecha_hora','p.nombre','p.direccion as dip','p.num_documento','v.tipo_comprobante','v.serie_comprobante','v.num_comprobante','v.impuesto','v.estado','v.total_venta','u.name','s.razon','s.direccion','s.telefono','s.email','s.logo','s.moneda','v.tipo_venta','s.cel','s.ruc','p.ruc as rucp','v.fecha_ven','p.telefono as tel','v.orden','v.referencia','v.cambio','v.num_guia','v.serie_guia','s.igv','s.ir','v.importe')
            ->where('v.idventa','=',$id)
            ->first();
        //calculo de impuesto
            $ig100=$ventas->igv;
            $ig2100=$ig100/100;
            $div=$ig2100+1;
            $tk=$ventas->importe;
            $cal=$tk/$div;
            $cal2=$cal*$ig2100;
             $cal3=round($cal2, 2); 
          /*  $ir1=$ventas->ir;
            $ir2=$ir1/100;
            $ir3=$ir2*$tk;
            $imgn=$cal2+$ir3;*/
            
        $detalles=DB::table('detalle_venta as d')
             ->join('articulo as a','d.idarticulo','=','a.idarticulo')
             ->select('a.nombre as articulo','d.cantidad','d.descuento','d.precio_venta','d.subtotal','d.idventa')
             ->where('d.idventa','=',$id)
             ->get();
        
         //fecha de hoy
         $mytime = Carbon::now('America/Lima');
	        $fe=$mytime;
         $pdf = \PDF::loadView('ventas.venta.vistaid', ["ventas"=>$ventas,"detalles"=>$detalles,"imgn"=>$cal3,"fe"=>$fe]);
        //return $pdf->download('archivo.pdf');
        return $pdf->stream();
    }
    
      public  function ticket($id){
        
         $ventas=DB::table('venta as v')
            ->join('persona as p','v.idcliente','=','p.idpersona')
            ->join('detalle_venta as dv','v.idventa','=','dv.idventa')
            ->join('users as u','v.iduser','=','u.id')
            ->join('user_sucursal as us','us.iduser','=','u.id')
            ->join('sucursal as s','us.idsucursal','=','s.idsucursal')
            ->select('v.idventa','v.fecha_hora','p.nombre','p.direccion as dip','p.num_documento','v.tipo_comprobante','v.serie_comprobante','v.num_comprobante','v.impuesto','v.estado','v.total_venta','u.name','s.razon','s.direccion','s.telefono','s.email','s.logo','s.moneda','v.tipo_venta','s.cel','s.ruc','p.ruc as rucp','v.fecha_ven','p.telefono as tel','v.orden','v.referencia','v.cambio','v.num_guia','v.serie_guia','s.igv','s.ir','v.importe','v.efectivo','v.vuelto','v.impuesto')
            ->where('v.idventa','=',$id)
            ->first();
        //calculo de impuesto
            $ig100=$ventas->impuesto;
            if($ig100=='0'){
                 $cal3=  $ig100;
            }else{
               
                 $ig2100=$ig100/100;
                $div=$ig2100+1;
                $tk=$ventas->importe;
                $cal=$tk/$div;
                $cal2=$cal*$ig2100;
                 $cal3=round($cal2, 2); 
            }
           
         
            
        $detalles=DB::table('detalle_venta as d')
             ->join('articulo as a','d.idarticulo','=','a.idarticulo')
             ->select('a.nombre as articulo','d.cantidad','d.descuento','d.precio_venta','d.subtotal','d.idventa')
             ->where('d.idventa','=',$id)
             ->get();
        
         //fecha de hoy
         $mytime = Carbon::now('America/Lima');
	     $fe=$mytime;
       
         $pdf = \PDF::loadView('ventas.venta.vistaticket', ["ventas"=>$ventas,"detalles"=>$detalles,"imgn"=>$cal3,"fe"=>$fe]);
        
        //return $pdf->download('archivo.pdf');
        return $pdf->setPaper(array(0,0,250,650))->stream();
    }
    
     public  function boleta($id){
        
         $ventas=DB::table('venta as v')
            ->join('persona as p','v.idcliente','=','p.idpersona')
            ->join('detalle_venta as dv','v.idventa','=','dv.idventa')
            ->join('users as u','v.iduser','=','u.id')
            ->join('user_sucursal as us','us.iduser','=','u.id')
            ->join('sucursal as s','us.idsucursal','=','s.idsucursal')
            ->select('v.idventa','v.fecha_hora','p.nombre','p.direccion as dip','p.num_documento','v.tipo_comprobante','v.serie_comprobante','v.num_comprobante','v.impuesto','v.estado','v.total_venta','u.name','s.razon','s.direccion','s.telefono','s.email','s.logo','s.moneda','v.tipo_venta','s.cel','s.ruc','p.ruc as rucp','v.fecha_ven','p.telefono as tel','v.orden','v.referencia','v.cambio','v.num_guia','v.serie_guia','s.igv','s.ir','v.importe','v.efectivo','v.vuelto','v.fecha_hora','v.observacion')
            ->where('v.idventa','=',$id)
            ->first();
        //calculo de impuesto
            $ig100=$ventas->igv;
            $ig2100=$ig100/100;
            $div=$ig2100+1;
            $tk=$ventas->importe;
            $cal=$tk/$div;
            $cal2=$cal*$ig2100;
             $cal3=round($cal2, 2); 
          /*  $ir1=$ventas->ir;
            $ir2=$ir1/100;
            $ir3=$ir2*$tk;
            $imgn=$cal2+$ir3;*/
            
        $detalles=DB::table('detalle_venta as d')
             ->join('articulo as a','d.idarticulo','=','a.idarticulo')
             ->select('a.nombre as articulo','d.cantidad','d.descuento','d.precio_venta','d.subtotal','d.idventa')
             ->where('d.idventa','=',$id)
             ->get();
        
         //fecha de hoy
         $mytime = Carbon::now('America/Lima');
	     $fe=$mytime;
       
         $pdf = \PDF::loadView('ventas.venta.vistaboleta', ["ventas"=>$ventas,"detalles"=>$detalles,"imgn"=>$cal3,"fe"=>$fe]);
        
        //return $pdf->download('archivo.pdf');
        return $pdf->setPaper(array(0,0,595,400))->stream();
    }
    
     public  function guia($id){
        
         $ventas=DB::table('venta as v')
            ->join('persona as p','v.idcliente','=','p.idpersona')
            ->join('detalle_venta as dv','v.idventa','=','dv.idventa')
            ->join('users as u','v.iduser','=','u.id')
            ->join('sucursal as s','u.idsucursal','=','s.idsucursal')
            ->select('v.idventa','v.fecha_hora','p.nombre','p.direccion as dip','p.num_documento','v.tipo_comprobante','v.serie_comprobante','v.num_comprobante','v.impuesto','v.estado','v.total_venta','u.name','s.razon','s.direccion','s.telefono','s.email','s.logo','s.moneda','v.tipo_venta','s.cel','s.ruc','p.ruc as rucp','v.fecha_ven','p.telefono as tel','v.orden','v.referencia','v.cambio','v.num_guia','v.serie_guia','s.igv','s.ir','v.importe','v.efectivo','v.vuelto','v.fecha_hora','v.observacion','v.fecha_guia','v.serie_guia','v.num_guia','v.p_partida','v.p_llegada','v.non_t','v.m_p','v.licencia','v.ruc_t','v.motivo')
            ->where('v.idventa','=',$id)
            ->first();
        //calculo de impuesto
            $ig100=$ventas->igv;
            $ig2100=$ig100/100;
            $div=$ig2100+1;
            $tk=$ventas->importe;
            $cal=$tk/$div;
            $cal2=$cal*$ig2100;
             $cal3=round($cal2, 2); 
          /*  $ir1=$ventas->ir;
            $ir2=$ir1/100;
            $ir3=$ir2*$tk;
            $imgn=$cal2+$ir3;*/
            
        $detalles=DB::table('detalle_venta as d')
             ->join('articulo as a','d.idarticulo','=','a.idarticulo')
             ->select('a.nombre as articulo','d.cantidad','d.descuento','d.precio_venta','d.subtotal','d.idventa','d.peso')
             ->where('d.idventa','=',$id)
             ->get();
        
         //fecha de hoy
         $mytime = Carbon::now('America/Lima');
	     $fe=$mytime;
       
         $pdf = \PDF::loadView('ventas.venta.vistaguia', ["ventas"=>$ventas,"detalles"=>$detalles,"imgn"=>$cal3,"fe"=>$fe]);
        
        //return $pdf->download('archivo.pdf');
        return $pdf->stream();
    }
}





