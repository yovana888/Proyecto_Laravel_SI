<?php

namespace sisVentas\Http\Controllers;

use Illuminate\Http\Request;
use sisVentas\Http\Requests;
use sisVentas\Edad;
use Illuminate\Support\Facades\Redirect;
use sisVentas\Http\Requests\EdadFormRequest;
use DB;
use Alert;

class EdadController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
            $edades=DB::table('edad')
            ->orderBy('idedad','desc')
            ->get();
            return view('almacen.edad.index',["edades"=>$edades]);

    }
    public function create()
    {
        return view("almacen.edad.create");
    }
    public function store (EdadFormRequest $request)
    {
        $edad=new Edad;
        $edad->nombre=$request->get('nombre');
        $edad->estado='Activo';
        $edad->save();
        Alert::success('La unidad se registro correctamente', 'Mensaje del Sistema')->persistent("Close");
        return Redirect::to('almacen/edad');

    }
    public function show($id)
    {
        return view("almacen.edad.show",["edad"=>Edad::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view("almacen.edad.edit",["edad"=>Edad::findOrFail($id)]);
    }
    public function update(EdadFormRequest $request,$id)
    {
        $edad=Edad::findOrFail($id);
        $edad->nombre=$request->get('nombre');
        $edad->estado=$request->get('estado'); //si solo si ha sido desactivado si es asi pordra activarlo
        $edad->update();
        Alert::success('La unidad se editó correctamente', 'Mensaje del Sistema')->persistent("Close");
        return Redirect::to('almacen/edad');
    }
    public function destroy($id)
    {
        $edad=Edad::findOrFail($id);
        $edad->estado='Inactivo';
        $edad->update();
        Alert::success('La unidad ha desactivado correctamente', 'Mensaje del Sistema')->persistent("Close");
        return Redirect::to('almacen/edad');
    }
}
