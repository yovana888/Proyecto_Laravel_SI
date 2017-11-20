<?php

namespace sisVentas\Http\Controllers;

use Illuminate\Http\Request;
use sisVentas\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sisVentas\Http\Requests\CreditoFormRequest;
use sisVentas\Credito;
use DB;
use sisVentas\Detalle_Credito;
use Auth;
use Session;
use Alert;
use Fpdf;
use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;

class CreditoController extends Controller
{
      public function __construct()
    {
        $this->middleware('auth');
    }
    
     public function index(Request $request)
    {
            $mytime = Carbon::now('America/Lima');
	        $hoy=$mytime->toDateTimeString();
         
           $sucursal=Auth::user()->id_s;
        if ($request)
        {
            $query=trim($request->get('searchText'));
            
            $detalles=DB::table('detalle_credito as cr')
            ->select('cr.idcredito','cr.monto','cr.fecha_pago')
            ->get();
            
        
                 $creditos=DB::table('credito as c')
                ->join('venta as v','c.idventa','=','v.idventa')
                ->join('persona as p','v.idcliente','=','p.idpersona')
                ->select('c.idcredito as idc','v.tipo_comprobante','v.serie_comprobante','v.num_comprobante','v.num_guia','v.serie_guia','c.idventa','p.nombre','p.telefono','c.total','c.estado','c.resto','c.fecha_px','c.idsucursal')
           
                ->where('c.idsucursal','=',$sucursal)
                ->where('v.num_comprobante','LIKE','%'.$query.'%')
                ->orwhere('v.tipo_comprobante','LIKE','%'.$query.'%')
                ->orwhere('p.nombre','LIKE','%'.$query.'%')
                ->groupBy('c.idcredito')
                ->orderBy('idc','desc')
                ->paginate(7);
            
            
            return view('ventas.credito.index',["creditos"=>$creditos,"searchText"=>$query,"detalles"=>$detalles,"hoy"=>$hoy]);
        }
          
         
   
    }
    
    
    
     public function create()
    {
      return view("ventas.credito.plus");
    }
    public function store (CreditoFormRequest $request)
    {
        //PARA DETALLE CREDITO
      
        $sucursal=Auth::user()->id_s;
        $cre=new Detalle_Credito;
        $cre->monto=$request->get('monto');
        $cre->idcredito=$request->get('idcre');
        $mytime = Carbon::now('America/Lima');
	    $cre->fecha_pago=$mytime->toDateTimeString();
        $cre->save();
        
        
       //PARA CREDITO
        
          
        $total=$request->get('total');
        $ve=$request->get('idv');
        $cre_actual=$request->get('idcre');
        $fecha_px=$request->get('fecha_px');
        $mon=$request->get('monto');
        $restopre=$request->get('restopre');
        
        $resto= $restopre-$mon; //AHORA ELLO HAY QUE ACTUALIZAR
      
        if($resto==0){
            //modificamos el estado de 
          
            
           DB::table('venta as v')
           ->where('v.idventa', $ve )
           ->update(['v.estado' =>'Pagado']);
            
           DB::table('credito as c')
           ->where('c.idcredito', $cre_actual )
           ->update(['c.estado' =>'Pagado','c.resto' =>$resto,'c.fecha_px'=>$mytime->toDateTimeString()]);
            
        }else{
            //nada en si aun el estado sale por cobrar en la tabla venta
            DB::table('credito as c')
           ->where('c.idcredito', $cre_actual )
           ->update(['c.resto' =>$resto,'c.fecha_px'=>$fecha_px]);
        }
        
       
        
         Alert::success('El nuevo monto se agrego correctamente', 'Mensaje del Sistema')->persistent("Close");
        return Redirect::to('ventas/credito');

    }
    
    
    
    
}
