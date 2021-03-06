<?php

namespace sisVentas\Http\Controllers;

use Illuminate\Http\Request;
use sisVentas\Http\Requests;
use sisVentas\Categoria;
use Illuminate\Support\Facades\Redirect;
use sisVentas\Http\Requests\CategoriaFormRequest;
use DB;
use Fpdf;
use Alert;
class CategoriaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {

            $categorias=DB::table('categoria')
            ->orderBy('idcategoria','desc')
            ->get();
            return view('almacen.categoria.index',["categorias"=>$categorias]);

    }
    public function create()
    {
        return view("almacen.categoria.create");
    }
    public function store (CategoriaFormRequest $request)
    {
        $categoria=new Categoria;
        $categoria->nombre=$request->get('nombre');
        $categoria->descripcion=$request->get('descripcion');
        $categoria->estado='Activo';
        $categoria->save();
        Alert::success('La Categoría se registro correctamente', 'Mensaje del Sistema')->persistent("Close");
        return Redirect::to('almacen/categoria');

    }
    public function show($id)
    {
        return view("almacen.categoria.show",["categoria"=>Categoria::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view("almacen.categoria.edit",["cat"=>Categoria::findOrFail($id)]);
    }
    public function update(CategoriaFormRequest $request,$id)
    {
        $categoria=Categoria::findOrFail($id);
        $categoria->nombre=$request->get('nombre');
        $categoria->descripcion=$request->get('descripcion');
        $categoria->estado=$request->get('condicion');
        $categoria->update();
        Alert::success('La Categoría se editó correctamente', 'Mensaje del Sistema')->persistent("Close");
        return Redirect::to('almacen/categoria');
    }
    public function destroy($id)
    {
        $categoria=Categoria::findOrFail($id);
        $categoria->delete();
        Alert::success('La Categoría se eliminó correctamente', 'Mensaje del Sistema')->persistent("Close");
        return Redirect::to('almacen/categoria');
    }
    public function reporte(){
         //Obtenemos los registros
         $registros=DB::table('categoria')
            ->where ('condicion','=','1')
            ->orderBy('nombre','asc')
            ->get();

         $pdf = new Fpdf();
         $pdf::AddPage();
         $pdf::SetTextColor(35,56,113);
         $pdf::SetFont('Arial','B',11);
         $pdf::Cell(0,10,utf8_decode("Listado Categorías"),0,"","C");
         $pdf::Ln();
         $pdf::Ln();
         $pdf::SetTextColor(0,0,0);  // Establece el color del texto
         $pdf::SetFillColor(206, 246, 245); // establece el color del fondo de la celda
         $pdf::SetFont('Arial','B',10);
         //El ancho de las columnas debe de sumar promedio 190
         $pdf::cell(50,8,utf8_decode("Nombre"),1,"","L",true);
         $pdf::cell(140,8,utf8_decode("Descripción"),1,"","L",true);

         $pdf::Ln();
         $pdf::SetTextColor(0,0,0);  // Establece el color del texto
         $pdf::SetFillColor(255, 255, 255); // establece el color del fondo de la celda
         $pdf::SetFont("Arial","",9);

         foreach ($registros as $reg)
         {
            $pdf::cell(50,6,utf8_decode($reg->nombre),1,"","L",true);
            $pdf::cell(140,6,utf8_decode($reg->descripcion),1,"","L",true);
            $pdf::Ln();
         }

         $pdf::Output();
         exit;
    }

}
