<?php

namespace sisVentas\Http\Controllers;
use Illuminate\Http\Request;
use sisVentas\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use sisVentas\Http\Requests\TipoFormRequest;
use sisVentas\Tipo;
use DB;
use Alert;

class TipoController extends Controller
{
      public function __construct()
    {
        $this->middleware('auth');

    }

    public function bySubcategoria($id){
        //aqui delvolveremos los tipos en base a la subcategoria
       return Tipo::where('idsubcategoria','=',$id)->get();
        //Este de aqui nos dara una coleccion una respuesta, para probar ello se creara un ruta
    }
    public function index(Request $request)
    {

            $tipos=DB::table('tipo as t')
            ->join('subcategoria as sc','t.idsubcategoria','=','sc.idsubcategoria')
            ->select('t.idtipo','t.nombre','sc.nombre as subcategoria','t.estado','t.idsubcategoria')
            ->orderBy('t.idtipo','desc')
            ->get();
            $subcategorias=DB::table('subcategoria')->where('estado','=','Activo')->get();
            return view('almacen.tipo.index',["tipos"=>$tipos,"subcategorias"=>$subcategorias]);



    }
    public function create()
    {

        $subcategorias=DB::table('subcategoria')->where('estado','=','Activo')->get();
        return view("almacen.tipo.create",["subcategorias"=>$subcategorias]);
    }
    public function store (TipoFormRequest $request)
    {
        $tipo=new Tipo;
        $tipo->idsubcategoria=$request->get('idsubcategoria');
        $tipo->nombre=$request->get('nombre');
        $tipo->estado='Activo';
        $tipo->save();
        Alert::success('El modelo se registro correctamente', 'Mensaje del Sistema')->persistent("Close");
        return Redirect::to('almacen/tipo');

    }
    public function show($id)
    {
        return view("almacen.tipo.show",["tipo"=>Tipo::findOrFail($id)]);
    }
    public function edit($id)
    {
        $tipo=Tipo::findOrFail($id);
        $subcategorias=DB::table('subcategoria')->where('estado','=','Activo')->get();
        return view("almacen.tipo.edit",["tipo"=>$tipo,"subcategorias"=>$subcategorias]);
    }


    public function update(TipoFormRequest $request,$id)
    {
        $tipo=Tipo::findOrFail($id);
        $tipo->idsubcategoria=$request->get('idsubcategoria');
        $tipo->nombre=$request->get('nombre');
        $tipo->estado=$request->get('estado');
        Alert::success('El modelo  se editó correctamente', 'Mensaje del Sistema')->persistent("Close");
        $tipo->update();
        return Redirect::to('almacen/tipo');
    }
    public function destroy($id)
    {
        $tipo=Tipo::findOrFail($id);
        $tipo->Estado='Inactivo';
        $tipo->update();
        Alert::success('El modelo se ha desactivado correctamente', 'Mensaje del Sistema')->persistent("Close");
        return Redirect::to('almacen/tipo');
    }
}
