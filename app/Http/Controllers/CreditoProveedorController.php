<?php

namespace sisVentas\Http\Controllers;

use Illuminate\Http\Request;
use sisVentas\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sisVentas\Http\Requests\CreditoProFormRequest;
use sisVentas\Credito_Proveedor;
use DB;
use sisVentas\Detalle_Credito_Pr;
use Auth;
use Session;
use Alert;
use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;

class CreditoProveedorController extends Controller
{
      public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
   {
     $detalles=DB::table('detalle_credito_proveedor')
     ->get();
     $creditos=DB::table('credito_proveedor as c')
    ->join('ingreso as i','i.idingreso','=','c.idcompra')
    ->join('persona as p','i.idproveedor','=','p.idpersona')
    ->select('c.idcredito','i.tipo_comprobante','i.serie_comprobante','i.num_comprobante','i.idingreso','p.nombre','p.cuenta','c.total','c.cant_letras','c.estado','c.resto','c.fecha_px')
    ->orderBy('c.idcredito','desc')
    ->get();
    $notificacion=0;
      return view('compras.credito.index',["creditos"=>$creditos,"detalles"=>$detalles,$notificacion]);
   }

   public function index2($id)
  {
    $detalles=DB::table('detalle_credito_proveedor as dcp')
    ->get();
    $creditos=DB::table('credito_proveedor as c')
   ->join('ingreso as i','i.idingreso','=','c.idcompra')
   ->join('persona as p','i.idproveedor','=','p.idpersona')
   ->select('c.idcredito','i.tipo_comprobante','i.serie_comprobante','i.num_comprobante','i.idingreso','p.nombre','p.cuenta','c.total','c.cant_letras','c.estado','c.resto','c.fecha_px')
   ->where('c.idcredito','=',$id)
   ->get();

   $notificacion=1;
     return view('compras.credito.index',["creditos"=>$creditos,"detalles"=>$detalles,$notificacion]);
  }

   public function create()
  {
    return view("compras.credito.plus");
  }
  public function store (CreditoProFormRequest $request)
  {
      //PARA DETALLE CREDITO


      $cre=new Detalle_Credito_Pr;
      $cre->monto=$request->get('monto');
      $cre->idcredito=$request->get('idcre');
      $mytime = Carbon::now('America/Lima');
      $cre->fecha_pago=$mytime->toDateTimeString();
      $cre->save();


     //PARA CREDIT

      $total=$request->get('total');
      $idi=$request->get('idi');
      $cre_actual=$request->get('idcre');
      $fecha_px=$request->get('fecha_px');
      $mon=$request->get('monto');
      $restopre=$request->get('resto');

      $resto= $restopre-$mon; //AHORA ELLO HAY QUE ACTUALIZAR

      if($resto==0){
          //modificamos el estado de
         DB::table('ingreso as i')
         ->where('i.idingreso', $idi )
         ->update(['i.estado' =>'Pagado']);


         $credito_g=Credito_Proveedor::findOrFail($cre_actual);
         $credito_g->fecha_px='';
         $credito_g->resto= $resto;
         $credito_g->estado= 'Pagado';
         $credito_g->update();

      }else{

        $credito_g=Credito_Proveedor::findOrFail($cre_actual);
        $credito_g->fecha_px=$fecha_px;
        $credito_g->resto= $resto;
        $credito_g->update();
      }



       Alert::success('El nuevo monto se agregó correctamente', 'Mensaje del Sistema')->persistent("Close");
      return Redirect::to('compras/credito');

  }
  public function edit($id)
  {
      return view("compras.credito.edit");
  }

  public function update(CreditoProFormRequest $request,$id)
  {
      $credito_p=Credito_Proveedor::findOrFail($id);
      $credito_p->cant_letras=$request->get('letras');
      $credito_p->fecha_px=$request->get('fecha_px');
      $credito_p->update();
      Alert::success('El crédito  se editó correctamente', 'Mensaje del Sistema')->persistent("Close");
      return Redirect::to('compras/credito');
  }

  public function destroy($id)
  {
      $credito_p=Credito_Proveedor::findOrFail($id);
      $credito_p->estado='Anulado';
      $credito_p->update();
      Alert::success('El crédito se ha anulado correctamente', 'Mensaje del Sistema')->persistent("Close");
      return Redirect::to('compras/credito');
  }


}
