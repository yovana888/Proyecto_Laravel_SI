<?php

namespace sisVentas\Http\Controllers;

use Illuminate\Http\Request;
use sisVentas\Http\Requests;
use sisVentas\Marca;
use Illuminate\Support\Facades\Redirect;
use sisVentas\Http\Requests\MarcaFormRequest;
use DB;
use Alert;


class MarcaController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $marcas=DB::table('marca')->where('nombre','LIKE','%'.$query.'%')
            ->orderBy('idmarca','desc')
            ->paginate(7);
            return view('almacen.marca.index',["marcas"=>$marcas,"searchText"=>$query]);
        }
    }
    public function create()
    {
        return view("almacen.marca.create");
    }
    public function store (MarcaFormRequest $request)
    {
        $marca=new Marca;
        $marca->nombre=$request->get('nombre');
        $marca->estado='Activo';
        $marca->save();
        return Redirect::to('almacen/marca');

    }
    public function show($id)
    {
        return view("almacen.marca.show",["marca"=>Marca::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view("almacen.marca.edit",["marca"=>Marca::findOrFail($id)]);
        
    }
    public function update(MarcaFormRequest $request,$id)
    {
        $marca=Marca::findOrFail($id);
        $marca->nombre=$request->get('nombre');
        $marca->estado=$request->get('estado'); //si solo si ha sido desactivado si es asi pordra activarlo
        $marca->update();
        Alert::success('La marca se editó correctamente', 'Mensaje del Sistema')->persistent("Close");
        return Redirect::to('almacen/marca');
    }
    public function destroy($id)
    {
        $marca=Marca::findOrFail($id);
        $marca->estado='Inactivo';
        $marca->update();
        return Redirect::to('almacen/marca');
    }
}
