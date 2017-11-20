<?php

namespace sisVentas\Http\Controllers;

use Illuminate\Http\Request;
use sisVentas\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use sisVentas\Http\Requests\MaterialFormRequest;
use sisVentas\Material;
use DB;
use Alert;
class MaterialController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function bySubcategoria($id){
        //aqui delvolveremos los tipos en base a la subcategoria
       return Material::where('idsubcategoria','=',$id)->get();
        //Este de aqui nos dara una coleccion una respuesta, para probar ello se creara un ruta
    }

    public function index(Request $request)
    {

            $materiales=DB::table('material as m')
            ->join('subcategoria as sc','m.idsubcategoria','=','sc.idsubcategoria')
            ->select('m.idmaterial','m.nombre','sc.nombre as subcategoria','m.estado','m.idsubcategoria')
            ->orderBy('m.idmaterial','desc')
            ->get();
            $subcategorias=DB::table('subcategoria')->where('estado','=','Activo')->get();
            return view('almacen.material.index',["materiales"=>$materiales,"subcategorias"=>$subcategorias]);

    }
    public function create()
    {
        $subcategorias=DB::table('subcategoria')->where('estado','=','Activo')->get();
        return view("almacen.material.create",["subcategorias"=>$subcategorias]);
    }
    public function store (MaterialFormRequest $request)
    {
        $material=new Material;
        $material->idsubcategoria=$request->get('idsubcategoria');
        $material->nombre=$request->get('nombre');
        $material->estado='Activo';
        $material->save();
          Alert::success('El material se registro correctamente', 'Mensaje del Sistema')->persistent("Close");
        return Redirect::to('almacen/material');

    }
    public function show($id)
    {
        return view("almacen.material.show",["material"=>Material::findOrFail($id)]);
    }
    public function edit($id)
    {
        $material=Material::findOrFail($id);
        $subcategorias=DB::table('subcategoria')->where('estado','=','Activo')->get();
        return view("almacen.material.edit",["material"=>$material,"subcategorias"=>$subcategorias]);
    }


    public function update(MaterialFormRequest $request,$id)
    {
        $material=Material::findOrFail($id);
        $material->idsubcategoria=$request->get('idsubcategoria');
        $material->nombre=$request->get('nombre');
        $material->estado=$request->get('estado');
        $material->update();
        Alert::success('El material  se editó correctamente', 'Mensaje del Sistema')->persistent("Close");
        return Redirect::to('almacen/material');
    }
    public function destroy($id)
    {
        $material=Material::findOrFail($id);
        $material->Estado='Inactivo';
        $material->update();
        Alert::success('El material se ha desactivado correctamente', 'Mensaje del Sistema')->persistent("Close");
        return Redirect::to('almacen/material');
    }
}
