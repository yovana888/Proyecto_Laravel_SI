<?php

namespace sisVentas\Http\Controllers;

use Illuminate\Http\Request;
use sisVentas\Http\Requests;
use sisVentas\Movimiento;
use sisVentas\Tipo_Movimiento;
use Illuminate\Support\Facades\Redirect;
use sisVentas\Http\Requests\MovimientoFormRequest;
use sisVentas\Articulo;
use DB;
use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;

use Auth;
use Session;
use Alert;

class MovimientoController extends Controller
{
      public function __construct()
    {
        $this->middleware('auth');
    }
    public function byTipo($id)
    {
      return Tipo_Movimiento::where('tipo_mov','=',$id)->get();
    }
    public function index(Request $request)
    {

            $sucursal=Auth::user()->id_s;
             $movimientos=DB::table('movimiento as m')
                ->join('detalle_articulo as dt','m.idarticulo','=','dt.iddetalle_articulo')
                ->join('articulo as a','a.idarticulo','=','dt.idarticulo')
                ->select('m.idmovimiento','m.idarticulo','m.tipo_movimiento','dt.codigo','m.motivo','m.fecha_mov','m.cantidad','m.nota','dt.color','m.idsucursal','m.nota','a.nombre')
                ->where('m.idsucursal','=', $sucursal)
                ->orderBy('m.idmovimiento','desc')
                ->get();
///para que no haya exceso de paginate hacemos el where aqui pz :v

            return view('movimientos.ultimos.index',["movimientos"=>$movimientos]);

    }
    public function create()
    {
       //return view("traslados.articulos.entrada");
       //return view("traslados.articulos.entrada");
    }
    public function store (MovimientoFormRequest $request)
    {
        $sucursal=Auth::user()->id_s;
        $cantidad=$request->get('cantidad');
        $stock=$request->get('st');
        $tipo_transaccion=$request->get('tipo_movimiento');
        $idarticulo=$request->get('iddetarticulo');
        $designacion=Auth::user()->s_actual;
        //averiguamos el tipo
        $tipo_consulta=DB::table('tipo_movimiento')
        ->select('tipo_mov')
        ->where('nombre','=',$tipo_transaccion)
        ->get();

        foreach ($tipo_consulta as $key ) {
          $tipo=$key->tipo_mov;
        }
        if($designacion=='Almacen'){
        //Cambiamos el stock directo en articulos de ALMACEN

        if($tipo=='Salida')
        {
            if($cantidad>$stock){
                  Alert::warning('La cantidad pedida es mayor al stock actual', 'Mensaje del Sistema')->persistent("Close");
                  return Redirect::to('almacen/articulo');
            }else{
                //ALMACENAMOS LA SALIDA EN MOV. Y ACTUALIZAMOS EL STOCK
                $mo=new Movimiento;
                $mo->tipo_movimiento=$tipo;
                $mo->motivo=  $tipo_transaccion;
                $mytime2 = Carbon::now('America/Lima');
                $mo->fecha_mov=$mytime2->toDateTimeString();
                $mo->idarticulo=$idarticulo;
                $mo->cantidad=$cantidad;
                $mo->estado='Activo';
                $mo->nota=$request->get('nota');
                $mo->idsucursal=$sucursal;
                $mo->save();

                $re=$stock-$cantidad;

                  DB::table('detalle_articulo as a')
                ->where('a.iddetalle_articulo','=' ,$idarticulo )
                ->update(['a.num_stock_gn' =>$re]);


                 Alert::success('El movimiento fue exitoso', 'Mensaje del Sistema')->persistent("Close");
                  return Redirect::to('almacen/articulo');
            }

        }else{

            //ENTRADA

            $mo=new Movimiento;
            $mo->tipo_movimiento=$tipo;
            $mo->motivo=  $tipo_transaccion;
            $mytime2 = Carbon::now('America/Lima');
            $mo->fecha_mov=$mytime2->toDateTimeString();
            $mo->idarticulo=$idarticulo;
            $mo->cantidad=$cantidad;
            $mo->estado='Activo';
            $mo->nota=$request->get('nota');
            $mo->idsucursal=$sucursal;
            $mo->save();

            $re=$stock+$cantidad;

              DB::table('detalle_articulo as a')
            ->where('a.iddetalle_articulo','=' ,$idarticulo )
            ->update(['a.num_stock_gn' =>$re]);


             Alert::success('El movimiento fue exitoso', 'Mensaje del Sistema')->persistent("Close");
              return Redirect::to('almacen/articulo');
        }


        }else{

         //Cambiamos el stock directo en articulos de TRASLADOS
        $idtraslado=$request->get('idtraslado');
        if($tipo=='Salida')
        {
            if($cantidad>$stock){
                  Alert::warning('La cantidad pedida es mayor al stock actual', 'Mensaje del Sistema')->persistent("Close");
                  return Redirect::to('traslados/articulos');
            }else{
                //ALMACENAMOS LA SALIDA EN MOV. Y ACTUALIZAMOS EL STOCK
                $mo=new Movimiento;
                $mo->tipo_movimiento=$tipo;
                $mo->motivo=$tipo_transaccion;
                $mytime2 = Carbon::now('America/Lima');
                $mo->fecha_mov=$mytime2->toDateTimeString();
                $mo->idarticulo=$request->get('idarticulo');
                $mo->cantidad=$cantidad;
                $mo->estado='Activo';
                $mo->nota=$request->get('nota');
                $mo->idsucursal=$sucursal;
                $mo->save();

                $re=$stock-$cantidad;

                DB::table('traslado as t')
                ->where('t.idtraslado','=' ,$idtraslado )
                ->update(['t.stock' =>$re]);


                 Alert::success('El movimiento fue exitoso', 'Mensaje del Sistema')->persistent("Close");
                  return Redirect::to('movimientos/ultimos');
            }

        }else{

            //ENTRADA

                $mo=new Movimiento;
                $mo->tipo_movimiento=$tipo;
                $mo->motivo=$tipo_transaccion;
                $mytime2 = Carbon::now('America/Lima');
                $mo->fecha_mov=$mytime2->toDateTimeString();
                $mo->idarticulo=$request->get('idarticulo');
                $mo->cantidad=$cantidad;
                $mo->estado='Activo';
                $mo->nota=$request->get('nota');
                $mo->idsucursal=$sucursal;
                $mo->save();

                $re=$stock+$cantidad;

                DB::table('traslado as t')
                ->where('t.idtraslado','=' ,$idtraslado )
                ->update(['t.stock' =>$re]);


                Alert::success('El movimiento fue exitoso', 'Mensaje del Sistema')->persistent("Close");
                return Redirect::to('movimientos/ultimos');

        }

        }



    }
    public function show($id)
    {
        return view("almacen.mov.show",["marca"=>Movimiento::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view("almacen.mov.edit",["movimiento"=>Movimiento::findOrFail($id)]);
    }
    public function update(MovimientoFormRequest $request,$id)
    {
      /*  $movimiento=Movimiento::findOrFail($id);
        $movimiento->tipo_movimiento=$request->get('tipo_movimiento');
        $movimiento->estado=$request->get('estado');
        $movimiento->motivo=$request->get('motivo');
        $movimiento->fecha_mov=$request->get('fecha_mov');
        $movimiento->cantidad=$request->get('cantidad');
         $co=$request->get('tipo_movimiento');
        $ok=$request->get('idarticulo');
        $movimiento->cantidad=$request->get('cantidad');
        $ok2=$request->get('cantidad');
        $movimiento->estado='Activo';

        $act= DB::table('articulo as at')
                ->select('at.stock as lol')
                ->where('at.idarticulo','=',$ok )
                ->get();

        $act2=$act->lol;
        if($co=='Entrada'){
        $re=$act2+$ok2

          DB::table('articulo as art')
                ->where('art.idarticulo', $ok )
                ->update(['art.stock' =>$re]);
        }else{
        $re=$act2-$ok2

          DB::table('articulo as art')
                ->where('art.idarticulo', $ok )
                ->update(['art.stock' =>$re]);
        }
        $movimiento->update();*/
        return Redirect::to('almacen/mov');
    }
    public function destroy($id)
    {
       $movimiento=Movimiento::findOrFail($id);
        $movimiento->estado='Inactivo';
        $movimiento->update();
        return Redirect::to('almacen/mov');
    }
}
