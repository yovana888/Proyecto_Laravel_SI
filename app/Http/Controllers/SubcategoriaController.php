<?php

namespace sisVentas\Http\Controllers;

use Illuminate\Http\Request;
use sisVentas\Http\Requests;
use sisVentas\Subcategoria;
use Illuminate\Support\Facades\Redirect;
use sisVentas\Http\Requests\SubcategoriaFormRequest;
use DB;
use Alert;
class SubcategoriaController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {

            $subcategorias=DB::table('subcategoria as s')
            ->join('categoria as c','s.idcategoria','=','c.idcategoria')
            ->select('s.idsubcategoria','s.nombre','c.nombre as categoria','s.estado','s.idcategoria')
            ->orderBy('idsubcategoria','desc')
            ->get();
            $categorias=DB::table('categoria')->where('estado','=','Activo')->get();
            return view('almacen.subcategoria.index',["subcategorias"=>$subcategorias,"categorias"=>$categorias]);

    }

    public function bySubcategoria($id){
       return Subcategoria::where('idcategoria','=',$id)->get();
    }
    public function create()
    {
        return view("almacen.subcategoria.create");
    }
    public function store (SubcategoriaFormRequest $request)
    {
        $subcategoria=new Subcategoria;
        $subcategoria->nombre=$request->get('nombre');
        $subcategoria->idcategoria=$request->get('idcategoria');
        $subcategoria->estado='Activo';
        $subcategoria->save();
        Alert::success('La Subcategoría fue registrada correctamente', 'Mensaje del Sistema')->persistent("Close");
        return Redirect::to('almacen/subcategoria');

    }
    public function show($id)
    {
        return view("almacen.subcategoria.show",["subcategoria"=>Subcategoria::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view("almacen.subcategoria.edit",["subcategoria"=>Subcategoria::findOrFail($id)]);
    }
    public function update(SubcategoriaFormRequest $request,$id)
    {
        $subcategoria=Subcategoria::findOrFail($id);
        $subcategoria->nombre=$request->get('nombre');
        $subcategoria->idcategoria=$request->get('idcategoria');
        $subcategoria->estado=$request->get('estado'); //si solo si ha sido desactivado si es asi pordra activarlo
        $subcategoria->update();
        Alert::success('La subcategoría  se editó correctamente', 'Mensaje del Sistema')->persistent("Close");
        return Redirect::to('almacen/subcategoria');
    }
    public function destroy($id)
    {
        $subcategoria=Subcategoria::findOrFail($id);
        $subcategoria->estado='Inactivo';
        $subcategoria->update();
        Alert::success('La Subcategoría se ha desactivado correctamente', 'Mensaje del Sistema')->persistent("Close");
        return Redirect::to('almacen/subcategoria');
    }
}
