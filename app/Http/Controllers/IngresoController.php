<?php

namespace sisVentas\Http\Controllers;

use Illuminate\Http\Request;

use sisVentas\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use sisVentas\Http\Requests\IngresoFormRequest;
use sisVentas\Ingreso;
use sisVentas\DetalleIngreso;
use sisVentas\DetalleArticulo;
use sisVentas\Credito_Proveedor;
use DB;
use Auth;
use Fpdf;
use Alert;
use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;

class IngresoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function byDetalles($id){
      $detalle=DB::table('detalle_articulo as da')
      ->join('articulo as art','art.idarticulo','=','da.idarticulo')
      ->select(DB::raw('CONCAT(art.nombre, " color ",da.etiqueta,"/",da.tam_nro1,da.UN1,"-",da.tam_nro2,da.UN2) AS articulo_com'),'da.iddetalle_articulo','da.precio_compra','da.medida_stock_gn')
      ->where('da.iddetalle_articulo','=',$id)
      ->get();
      return  $detalle;
    }

    public function byFiltro($id){
      //articulos filtrados por proveedor
      $articulosfiltro= DB::table('detalle_proveedor as dp')
      ->join('detalle_articulo as da','da.iddetalle_articulo','=','dp.idarticulo')
      ->join('articulo as art','art.idarticulo','=','da.idarticulo')
      ->select(DB::raw('CONCAT(da.codigo, " ",art.nombre, " color ",da.etiqueta) AS articulo'),'da.iddetalle_articulo','da.UN1','da.UN2','da.tam_nro1','da.tam_nro2')
      ->where('da.estado','=','Activo')
      ->where('dp.idproveedor','=',$id)
      ->get();
      return $articulosfiltro;
    }




    public function index(Request $request)
    {

           $ingresos=DB::table('ingreso as i')
            ->join('persona as p','i.idproveedor','=','p.idpersona')
            ->select('i.idingreso','i.fecha_hora','p.nombre','i.tipo_comprobante','i.serie_comprobante','i.num_comprobante','i.impuesto','i.estado','i.total','i.subtotal','i.nota','i.gratuito','i.exonerado','i.inafecto','i.descuento')
            ->orderBy('i.idingreso','desc')
            ->get();

          $detalles=DB::table('detalle_ingreso as di')
          ->join('detalle_articulo as da','da.iddetalle_articulo','=','di.idarticulo')
          ->join('articulo as a','a.idarticulo','=','da.idarticulo')
          ->select('di.iddetalle_ingreso','a.nombre','da.etiqueta','di.cantidad','di.importe','di.precio_compra','di.idingreso','di.descuento','di.tipo_igv','di.precio_real','di.cantidad_detalle','di.medida','di.precio_real_uni')
          ->get();
          return view('compras.ingreso.index',["ingresos"=>$ingresos,"detalles"=>$detalles]);


    }
    public function create()
    {
      $personas=DB::table('persona')
      ->where('tipo_persona','=','Proveedor')
      ->where('estado','=','Activo')
      ->get();

      $articulos = DB::table('detalle_articulo as da')
      ->join('articulo as art','art.idarticulo','=','da.idarticulo')
      ->select(DB::raw('CONCAT(da.codigo, " ",art.nombre, " color ",da.etiqueta) AS articulo'),'da.iddetalle_articulo','da.UN1','da.UN2','da.tam_nro1','da.tam_nro2')
      ->get();
      $medidas_cont = DB::table('edad')->get();
    	return view("compras.ingreso.create",["personas"=>$personas,"articulos"=>$articulos,"medidas_cont"=>$medidas_cont]);
    }

     public function store (IngresoFormRequest $request)
    {
          $mytime2 = Carbon::now('America/Lima');
        	$ingreso=new Ingreso;
	        $ingreso->idproveedor=$request->get('idproveedor');
	        $ingreso->tipo_comprobante=$request->get('tipo_comprobante');
	        $ingreso->serie_comprobante=$request->get('serie_comprobante');
	        $ingreso->num_comprobante=$request->get('num_comprobante');
	        $ingreso->fecha_hora=$mytime2->toDateTimeString();
          $ingreso->total=$request->get('todo');
          $ingreso->subtotal=$request->get('subtodo');
          $ingreso->impuesto=$request->get('todoigv');
          $ingreso->exonerado=$request->get('exo');
          $ingreso->gratuito=$request->get('gratis');
          $ingreso->inafecto=$request->get('inafecta');
          $ingreso->descuento=$request->get('des');
          $ingreso->tipo_pago=$request->get('tipo_pago');
          $verificar=$request->get('tipo_pago');

          if($verificar=='Contado'){
             $ingreso->estado='Aceptado';
          }else{
            $ingreso->estado='Por Pagar';
            $fec=$request->get('fecha_p');
          }
          $ingreso->nota=$request->get('nota');
	        $ingreso->save();



          if($verificar=='Contado'){
            //nada
          }else{

            //insertamos el credito
            $credito_g=new Credito_Proveedor;
            $credito_g->idcompra=$ingreso->idingreso;
            $credito_g->total= $ingreso->total;
            $credito_g->fecha_px=$fec;
            $monto_p=$request->get('monto');
            $todo=$request->get('todo');
            $credito_g->resto= $todo-$monto_p;
            $credito_g->estado='Por Cobrar';
            $credito_g->cant_letras=$request->get('letras');
            $credito_g->save();

            //AHORA DETALLE DE CREDITO
            DB::table('detalle_credito_proveedor')->insert(
            ['idcredito' => $credito_g->idcredito, 'fecha_pago' => $ingreso->fecha_hora ,'monto' => $monto_p]
            );

          }
            //aqui simplemente en ves de almacenralo directamente ne la tabla ingreso, lo q se hace es que lo almacenamos en variables, de alli iniciamos un blucle ya q nos dan aun array, y para ya almacenarlo, en cada posicion por decir [0] corresponde a un registro q ira para DIngreso, es por ello como ya se hizo el modelo para este, no hay problem..., creamos un objeto detalle en base a esta clase y de alli accedemos a sus propiedades y le mandamos todos losregistros q tiene el array y q cada indice tiene un registro .

	        $idarticulo = $request->get('idarticulo');
	        $cantidad = $request->get('cantidad');
	        $precio_compra = $request->get('precio_compra');
          $tipo_igv = $request->get('tipoigv');
          $descu=$request->get('descuento');
          $medida_contenedor=$request->get('med');
          $cant_detall=$request->get('cantidad_dt');

	        $cont = 0;

	        while($cont < count($idarticulo)){
	            $detalle = new DetalleIngreso();
	            $detalle->idingreso= $ingreso->idingreso;
	            $detalle->idarticulo= $idarticulo[$cont]; //:c
              $detalle->medida= $medida_contenedor[$cont];
              $detalle->cantidad_detalle= $cant_detall[$cont];

              ///primero importe
              $detalle->importe= $precio_compra[$cont] * $cantidad[$cont] - ($precio_compra[$cont] * $cantidad[$cont] * $descu[$cont])/100;
              $importe_relativo=  $detalle->importe;
              //descuento unitario
              $detalle->descuento=$descu[$cont];
              $descuento_relativo=$descu[$cont];
              //igv unitario
              $detalle->tipo_igv=$tipo_igv[$cont];
              $igv_relativo=  $importe_relativo*0.18;
              //PRECIO REAL
              $precio_r0=($igv_relativo/$cantidad[$cont])-($precio_compra[$cont]*$descuento_relativo/100)+$precio_compra[$cont];
              $precio_r= round($precio_r0, 2);
              //FIN PRECIO REAL
	            $detalle->cantidad= $cantidad[$cont];
	            $detalle->precio_compra= $precio_compra[$cont];
              $detalle->precio_real=$precio_r;
              $cantidad_rel=$cant_detall[$cont]; //esto es para hallar el P. real unitario
              $detalle->precio_real_uni=$precio_r/$cantidad_rel;

              DB::table('detalle_articulo as da')
              ->where('da.iddetalle_articulo', $idarticulo[$cont] )
              ->update(['da.precio_compra' =>$precio_compra[$cont],'da.precio_real' =>$detalle->precio_real_uni]);
	            $detalle->save();
	            $cont=$cont+1;
}

  Alert::success('La compra se agrego correctamente', 'Mensaje del Sistema')->persistent("Close");
        return Redirect::to('compras/ingreso');
    }


    public function destroy($id)
    {
    	$ingreso=Ingreso::findOrFail($id);
        $ingreso->estado='Anulado';
        $ingreso->update();
          Alert::success('La compra se anulo correctamente', 'Mensaje del Sistema')->persistent("Close");
        return Redirect::to('compras/ingreso');
    }
    public function reportec($id){
         //Obtengo los datos

    $ingreso=DB::table('ingreso as i')
            ->join('persona as p','i.idproveedor','=','p.idpersona')
            ->join('detalle_ingreso as di','i.idingreso','=','di.idingreso')
            ->select('i.idingreso','i.fecha_hora','p.nombre','p.direccion','p.num_documento','i.tipo_comprobante','i.serie_comprobante','i.num_comprobante','i.impuesto','i.estado',DB::raw('sum(di.cantidad*precio_compra) as total'))
            ->where('i.idingreso','=',$id)
            ->first();

        $detalles=DB::table('detalle_ingreso as d')
             ->join('articulo as a','d.idarticulo','=','a.idarticulo')
             ->select('a.nombre as articulo','d.cantidad','d.precio_compra','d.precio_venta')
             ->where('d.idingreso','=',$id)
             ->get();


        $pdf = new Fpdf();
        $pdf::AddPage();
        $pdf::SetFont('Arial','B',14);
        //Inicio con el reporte
        $pdf::SetXY(170,20);
        $pdf::Cell(0,0,utf8_decode($ingreso->tipo_comprobante));

        $pdf::SetFont('Arial','B',14);
        //Inicio con el reporte
        $pdf::SetXY(170,40);
        $pdf::Cell(0,0,utf8_decode($ingreso->serie_comprobante."-".$ingreso->num_comprobante));

        $pdf::SetFont('Arial','B',10);
        $pdf::SetXY(35,60);
        $pdf::Cell(0,0,utf8_decode($ingreso->nombre));
        $pdf::SetXY(35,69);
        $pdf::Cell(0,0,utf8_decode($ingreso->direccion));
        //***Parte de la derecha
        $pdf::SetXY(180,60);
        $pdf::Cell(0,0,utf8_decode($ingreso->num_documento));
        $pdf::SetXY(180,69);
        $pdf::Cell(0,0,substr($ingreso->fecha_hora,0,10));
        $total=0;

        //Mostramos los detalles
        $y=89;
        foreach($detalles as $det){
            $pdf::SetXY(20,$y);
            $pdf::MultiCell(10,0,$det->cantidad);

            $pdf::SetXY(32,$y);
            $pdf::MultiCell(120,0,utf8_decode($det->articulo));

            $pdf::SetXY(162,$y);
            $pdf::MultiCell(25,0,$det->precio_compra);

            $pdf::SetXY(187,$y);
            $pdf::MultiCell(25,0,sprintf("%0.2F",($det->precio_compra*$det->cantidad)));

            $total=$total+($det->precio_compra*$det->cantidad);
            $y=$y+7;
        }

        $pdf::SetXY(187,153);
        $pdf::MultiCell(20,0,"".sprintf("%0.2F", $ingreso->total-($ingreso->total*$ingreso->impuesto/($ingreso->impuesto+100))));
        $pdf::SetXY(187,160);
        $pdf::MultiCell(20,0,"".sprintf("%0.2F", ($ingreso->total*$ingreso->impuesto/($ingreso->impuesto+100))));
        $pdf::SetXY(187,167);
        $pdf::MultiCell(20,0,"".sprintf("%0.2F", $ingreso->total));

        $pdf::Output();
        exit;
    }
    public function reporte(){
         //Obtenemos los registros
         $registros=DB::table('ingreso as i')
            ->join('persona as p','i.idproveedor','=','p.idpersona')
            ->join('detalle_ingreso as di','i.idingreso','=','di.idingreso')
            ->select('i.idingreso','i.fecha_hora','p.nombre','i.tipo_comprobante','i.serie_comprobante','i.num_comprobante','i.impuesto','i.estado',DB::raw('sum(di.cantidad*precio_compra) as total'))
            ->orderBy('i.idingreso','desc')
            ->groupBy('i.idingreso','i.fecha_hora','p.nombre','i.tipo_comprobante','i.serie_comprobante','i.num_comprobante','i.impuesto','i.estado')
            ->get();

         //Ponemos la hoja Horizontal (L)
         $pdf = new Fpdf('L','mm','A4');
         $pdf::AddPage();
         $pdf::SetTextColor(35,56,113);
         $pdf::SetFont('Arial','B',11);
         $pdf::Cell(0,10,utf8_decode("Listado Compras"),0,"","C");
         $pdf::Ln();
         $pdf::Ln();
         $pdf::SetTextColor(0,0,0);  // Establece el color del texto
         $pdf::SetFillColor(206, 246, 245); // establece el color del fondo de la celda
         $pdf::SetFont('Arial','B',10);
         //El ancho de las columnas debe de sumar promedio 190
         $pdf::cell(35,8,utf8_decode("Fecha"),1,"","L",true);
         $pdf::cell(80,8,utf8_decode("Proveedor"),1,"","L",true);
         $pdf::cell(45,8,utf8_decode("Comprobante"),1,"","L",true);
         $pdf::cell(10,8,utf8_decode("Imp"),1,"","C",true);
         $pdf::cell(25,8,utf8_decode("Total"),1,"","R",true);

         $pdf::Ln();
         $pdf::SetTextColor(0,0,0);  // Establece el color del texto
         $pdf::SetFillColor(255, 255, 255); // establece el color del fondo de la celda
         $pdf::SetFont("Arial","",9);

         foreach ($registros as $reg)
         {
            $pdf::cell(35,8,utf8_decode($reg->fecha_hora),1,"","L",true);
            $pdf::cell(80,8,utf8_decode($reg->nombre),1,"","L",true);
            $pdf::cell(45,8,utf8_decode($reg->tipo_comprobante.': '.$reg->serie_comprobante.'-'.$reg->num_comprobante),1,"","L",true);
            $pdf::cell(10,8,utf8_decode($reg->impuesto),1,"","C",true);
            $pdf::cell(25,8,utf8_decode($reg->total),1,"","R",true);
            $pdf::Ln();
         }

         $pdf::Output();
         exit;
    }
}
