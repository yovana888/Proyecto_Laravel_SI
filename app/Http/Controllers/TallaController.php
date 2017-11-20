<?php

namespace sisVentas\Http\Controllers;

use Illuminate\Http\Request;
use sisVentas\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use sisVentas\Http\Requests\TallaFormRequest;
use sisVentas\Talla;
use DB;


class TallaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
     public function bySubcategoria($id){
        //aqui delvolveremos los tipos en base a la subcategoria
       return Talla::where('idsubcategoria','=',$id)->get();
        //Este de aqui nos dara una coleccion una respuesta, para probar ello se creara un ruta 
    }
    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $tallas=DB::table('talla as t')
            ->join('subcategoria as sc','t.idsubcategoria','=','sc.idsubcategoria')
            ->select('t.idtalla','t.nombre','sc.nombre as subcategoria','t.estado','t.idsubcategoria')
            ->where('t.nombre','LIKE','%'.$query.'%')
            ->orwhere('sc.nombre','LIKE','%'.$query.'%')
            ->orderBy('t.idtalla','desc')
            ->paginate(7);
            $subcategorias=DB::table('subcategoria')->where('estado','=','Activo')->get();
            return view('almacen.talla.index',["tallas"=>$tallas,"searchText"=>$query,"subcategorias"=>$subcategorias]);
        }
    }
    public function create()
    {
        $subcategorias=DB::table('subcategoria')->where('estado','=','Activo')->get();
        return view("almacen.talla.create",["subcategorias"=>$subcategorias]);
    }
    public function store (TallaFormRequest $request)
    {
        $talla=new Talla;
        $talla->idsubcategoria=$request->get('idsubcategoria');
        $talla->nombre=$request->get('nombre');
        $talla->estado='Activo';
        $talla->save();
        return Redirect::to('almacen/talla');

    }
    public function show($id)
    {
        return view("almacen.talla.show",["talla"=>Talla::findOrFail($id)]);
    }
    public function edit($id)
    {
        $talla=Talla::findOrFail($id);
        $subcategorias=DB::table('subcategoria')->where('estado','=','Activo')->get();
        return view("almacen.talla.edit",["talla"=>$talla,"subcategorias"=>$subcategorias]);
    }
    
    
    public function update(TallaFormRequest $request,$id)
    {
        $talla=Talla::findOrFail($id);
        $talla->idsubcategoria=$request->get('idsubcategoria');
        $talla->nombre=$request->get('nombre');
        $talla->estado=$request->get('estado');
        $talla->update();
        return Redirect::to('almacen/talla');
    }
    public function destroy($id)
    {
        $talla=Material::findOrFail($id);
        $talla->Estado='Inactivo';
        $talla->update();
        return Redirect::to('almacen/talla');
    }
}
