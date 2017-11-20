<?php

namespace sisVentas\Http\Controllers;

use Illuminate\Http\Request;

use sisVentas\Http\Requests;

use DB;
use Auth;
use Alert;
use Carbon\Carbon;
use Response;

class EscritorioController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          //detalles de los articulos con stock por debajo del minimo
          $detalles=DB::table('detalle_articulo as da')
          ->join('articulo as art','art.idarticulo','=','da.idarticulo')
          ->select(DB::raw('CONCAT(art.nombre, " color ",da.etiqueta,"/",da.tam_nro1,da.UN1,"-",da.tam_nro2,da.UN2) AS articulo_com'),'da.iddetalle_articulo','da.imagen','da.stockmin','da.medida_stock_gn','da.num_stock_gn','da.medida_stock_det','da.num_stock_det')
          ->get();

          $s_ac=Auth::user()->id_s;

          $total_pro=DB::table('persona')
          ->where('tipo_persona','=','Proveedor')
          ->where('estado','=','Activo')
          ->count();
          //utilizaremos ello para mostrar el reporte grafico
          $comprasmes=DB::select('SELECT monthname(i.fecha_hora) as mes, sum(i.total) as totalmes from ingreso i where i.estado="Aceptado" or i.estado="Pagado" group by monthname(i.fecha_hora) order by month(i.fecha_hora) asc limit 12');
          //esto es para las compras del dia de hoy
          $comprashoy=DB::select('SELECT sum(i.total) as totaldia from ingreso i where (i.estado="Aceptado" or i.estado="Pagado") and (i.fecha_hora=CURRENT_DATE())');
          //esto es para ver las comprasen los ultimos 15 diass
          $comprasdias=DB::select('SELECT DATE(i.fecha_hora) as dia, sum(i.total) as totaldia from ingreso i where (i.estado="Aceptado" or i.estado="Pagado") group by i.fecha_hora order by day(i.fecha_hora) desc limit 14');
          $proveedores = DB::table('detalle_proveedor as dp')
         ->join('persona as per','per.idpersona','=','dp.idproveedor')
         ->select('per.nombre','dp.idarticulo','per.email','per.telefono')
         ->where('per.tipo_persona','=','Proveedor')
         ->get();
         $anuladas=DB::table('ingreso as i')->where('i.estado','=','Anulado')->count();
         $aceptadas=DB::table('ingreso as i')->where('i.estado','=','Aceptado')->count();
         $faltantes=DB::table('ingreso as i')->where('i.estado','=','Por Pagar')->count();
         $pagadas=DB::table('ingreso as i')->where('i.estado','=','Pagado')->count();
         $mascomprado=DB::select('SELECT a.nombre as articulo,da.etiqueta as color,sum(di.cantidad_detalle) as cantidad from articulo a inner join detalle_articulo da on a.idarticulo=da.idarticulo inner join detalle_ingreso di on da.iddetalle_articulo=di.idarticulo inner join ingreso i on i.idingreso=di.idingreso where (i.estado="Aceptado" or i.estado="Pagado") and year(i.fecha_hora)=year(curdate()) group by da.etiqueta order by sum(di.cantidad_detalle) desc limit 8');
        return view('escritorio',["anuladas"=>$anuladas,"aceptadas"=>$aceptadas,"faltantes"=>$faltantes,"pagadas"=>$pagadas,"mascomprado"=>$mascomprado,"comprasdias"=>$comprasdias,"comprasmes"=>$comprasmes,"detalles"=>$detalles,"proveedores"=>$proveedores,"total1"=>$total_pro,"comprashoy"=>$comprashoy]);

    }



}
