<?php

namespace sisVentas\Http\Controllers;

use Illuminate\Http\Request;
use sisVentas\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
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


class TrasladoHechoController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {

            $idsucursal=Auth::user()->id_s;
            $sucursal=Auth::user()->s_actual;
            $sucursales=DB::table('sucursal')->get();

            if($sucursal=='Almacen'){
                    //entonces saco mis articulos de la tabla articulo con detalle articulo :v , a diferencia
                    //de los entrantes en si le paso mi sucursal pq es aqui donde se agrega un traslado, en cambio
                    //en el otro q es entrantes no es necesario :v
                    $misucursal = DB::table('detalle_articulo as da')
                    ->join('articulo as art','art.idarticulo','=','da.idarticulo')
                    ->select(DB::raw('CONCAT(da.codigo, " ",art.nombre, " color ",da.etiqueta) AS articulo'),'da.iddetalle_articulo','da.UN1','da.UN2','da.tam_nro1','da.tam_nro2')
                     ->orderBy('da.iddetalle_articulo','desc')
                    ->get();

            }else{

                //ES PORQUE ESTOY EN SUCURSAL


                   $misucursal=DB::table('traslado as t')
                  ->join('detalle_articulo as da','da.iddetalle_articulo','=','t.idarticulo')
                  ->join('articulo as art','art.idarticulo','=','da.idarticulo')
                  ->select(DB::raw('CONCAT(da.codigo, " ",art.nombre, " color ",da.etiqueta) AS articulo'),'da.iddetalle_articulo','da.UN1','da.UN2','da.tam_nro1','da.tam_nro2')
                    ->where('t.idsucursal','=',$idsucursal)
                    ->orderBy('t.idtraslado','desc')
                    ->get();

            }


            $traslados=DB::table('notificacion_traslado as nt')
            ->join('sucursal as s','s.idsucursal','=','nt.idemisor')
            ->select('nt.idnotificacion_traslado','nt.idreceptor','nt.idemisor','s.razon','nt.nota','nt.fecha_hora','nt.nuevo','nt.estado')
            ->where('nt.idemisor','=', $idsucursal)
            ->orderBy('nt.idnotificacion_traslado','desc')
            ->get();


           $detalles=DB::table('detalle_traslado as dt')
           ->join('detalle_articulo as da','da.iddetalle_articulo','=','dt.idarticulo')
           ->join('articulo as art','da.idarticulo','=','art.idarticulo')
           ->select(DB::raw('CONCAT(da.codigo, " ",art.nombre, " color ",da.etiqueta) AS articulo'),'da.UN1','da.UN2','da.tam_nro1','da.tam_nro2','dt.idnotificacion_tras','dt.idarticulo','dt.cantidad','dt.precio_venta','dt.cantidad_volumen1','dt.precio_mayor1','dt.cantidad_volumen2','dt.precio_mayor2','dt.cantidad_volumen3','dt.precio_mayor3','iddetalle_traslado')
           ->get();


          return view('traslados.realizados.index',["sucursales" =>$sucursales,"misucursal"=>$misucursal,"traslados"=>$traslados,"detalles"=>$detalles]);

    }

        public function destroy($id_act)
    {
        DB::table('detalle_traslado')->where('iddetalle_traslado', '=', $id_act)->delete();


          Alert::success('Se eliminó correctamente el articulo asociado al traslado', 'Mensaje del Sistema')->persistent("Close");
        return Redirect::to('traslados/realizados');
    }


}
