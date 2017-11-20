<?php

namespace sisVentas\Http\Controllers;

use Illuminate\Http\Request;
use sisVentas\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input; // para imagenes
use sisVentas\Http\Requests\ArticuloFormRequest;
use sisVentas\Http\Requests\TipoFormRequest;
use sisVentas\Articulo;
use sisVentas\Movimiento;
use sisVentas\DetalleArticulo;
use sisVentas\Tipo;
use DB;
use Session;
use Alert;
use Fpdf;
use Auth;

use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;


class ArticuloController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function index(Request $request)
    {

            $categorias=DB::table('categoria as ca')->where('estado','=','Activo')->get();
             $articulos=DB::table('articulo as a')
                ->join('categoria as c','a.idcategoria','=','c.idcategoria')
                ->select('a.idarticulo','a.nombre','c.nombre as categoria','a.imagen','a.estado','a.tipo','a.material','a.descripcion','a.etiqueta','a.subcategoria')
                ->orderBy('a.idarticulo','desc')
                ->get();
            return view('almacen.articulo.index',["articulos"=>$articulos,"categorias"=>$categorias]);


    }


    public function create()
    {
           return view("almacen.articulo.create");

    }

    public function gettipos(TipoFormRequest $request, $id){
        //el id sera enviado por la ruta
        if($request->ajax()){ //si la peticion es asi retornamos una respuesta
            $tipos=Tipo::tipos($id);

            return response()->json($tipos);

        }

    }
    public function store (ArticuloFormRequest $request )
    {
        $articulo=new Articulo;
        //son Id es decir el valor a almacenarse son numeros
        $articulo->idcategoria=$request->get('idcategoria');
        //detreminamos el nombre de la subcategoria
        $subini=$request->get('subcategoria');

        $namea=DB::table('subcategoria')
        ->select('nombre')
        ->where('idsubcategoria','=',$subini)
        ->get();
              //normal
              foreach($namea as $ur1){
                $riri=$ur1->nombre;
              }
        $articulo->subcategoria=$riri;
        $articulo->tipo=$request->get('modelo');
        $articulo->material=$request->get('material');


        //llenable por usuario
        $articulo->etiqueta=$request->get('etiqueta');
        $articulo->descripcion=$request->get('descripcion');
        $articulo->estado='Activo';
       // $articulo->nombre=$request->get('nombre'); Autogenerado


        $nom0=$request->get('inline_radio');
        $nom1=$request->get('material');
        $nom2=$request->get('modelo');

        if($nom0=='1'){

          $nom_concat= $riri. " " .'de'. " " .$nom1. " " .$nom2;
          $articulo->nombre=$nom_concat;
        }else{
          $nom_concat= $riri. " " .$nom1. " " .$nom2;
          $articulo->nombre=$nom_concat;
        }



        if (Input::hasFile('imagen')){
        	$file=Input::file('imagen');
        	$file->move(public_path().'/imagenes/articulos/',$file->getClientOriginalName());
            $articulo->imagen=$file->getClientOriginalName();
        }


        $articulo->save();
    /*    $sucursal_a=Auth::user()->id_s;
        $mytime3 = Carbon::now('America/Lima');
                DB::table('movimiento')->insert(
                ['idarticulo' => $articulo->idarticulo, 'tipo_movimiento' => 'Entrada' ,'motivo' => 'Inventario Inicial', 'cantidad' =>  $articulo->stock, 'estado' => 'Activo' , 'fecha_mov' => $mytime3->toDateTimeString(),'idsucursal' =>$sucursal_a,'nota'=>'-']); */
          Alert::success('El Articulo se agrego correctamente', 'Mensaje del Sistema')->persistent("Close");
        return Redirect::to('almacen/articulo');


    }


    public function show($id)
    {
          $detalles=DB::table('detalle_articulo as da')
          ->where('da.idarticulo','=',$id)
          ->get();
          $tipos=DB::table('tipo_movimiento')->get();
          $medidas=DB::table('edad as ed')->where('estado','=','Activo')->get();
          $articulo_nom=DB::table('articulo as a')
             ->select('a.nombre')
             ->where('a.idarticulo','=',$id)
             ->get();
        return view("almacen.articulo.plus",["detalles"=>$detalles,"articulo_nom"=>$articulo_nom,"medidas"=>$medidas,"tipos"=>$tipos]);

    }
    public function edit($id) //similar al create
    {
         $articulo=Articulo::findOrFail($id);

         $categorias=DB::table('categoria')->where('condicion','=','1')->get();
         $subcategorias=DB::table('subcategoria')->where('estado','=','Activo')->get();
         $tipos=DB::table('tipo')->where('estado','=','Activo')->get();
         $marcas=DB::table('marca')->where('estado','=','Activo')->get();
         $clubs=DB::table('club')->where('estado','=','Activo')->get();
         $materiales=DB::table('material')->where('estado','=','Activo')->get();
         $tallas=DB::table('talla')->where('estado','=','Activo')->get();
         $edades=DB::table('edad')->where('estado','=','Activo')->get();

         return view("almacen.articulo.edit",["articulo"=>$articulo,"categorias"=>$categorias,"subcategorias"=>$subcategorias,"marcas"=>$marcas,"tipos"=>$tipos,"clubs"=>$clubs,"materiales"=>$materiales,"tallas"=>$tallas,"edades"=>$edades]);


    }


    public function update(ArticuloFormRequest $request,$id)
    {
        $articulo=Articulo::findOrFail($id);

        //lo mismo que create
        $articulo->idcategoria=$request->get('idcategoria');
        $articulo->idsubcategoria=$request->get('idsubcategoria');
        $articulo->club=$request->get('club');
        $articulo->marca=$request->get('marca');
        $articulo->tipo=$request->get('tipo');
        $articulo->material=$request->get('material');
        $articulo->talla=$request->get('talla');
        $articulo->sexo=$request->get('sexo');
        $articulo->edad=$request->get('edad');
        $articulo->color=$request->get('color');
        $articulo->descripcion=$request->get('descripcion');
        $articulo->stock=$request->get('stock');
        $articulo->stockmin=$request->get('stockmin');
        $articulo->precio_venta=$request->get('precio_venta');
        $articulo->cantidad_volumen=$request->get('cantidad_volumen');
        $articulo->precio_mayor=$request->get('precio_mayor');
        $articulo->estado=$request->get('estado');


        ///generando codigo a concatenar ///////////////

        $aaa=$id;
       // implode($array_equipo)
        $long_num=strlen($aaa);
        $cont=0;
        $base=0;
        //cantidad de ceros a completar
        $cant_0_r=5-$long_num;
        $digitos=0;
        if($aaa==100000){

            Flash::danger("Ya no se puede autogenerar más numeros: Tope 99999 para articulos, Comunicarse con los desarroladores yovana.otaku@gmail.com o vaya a soporte tecnico");
            return view('almacen.articulo.index');

        }
        else {
            while($cont < $cant_0_r-1)
            {

                $digitos=$digitos . $base;
                $cont++;
            }
        }

        $num_articulo=$digitos . $aaa;

        $articulo->codigo='8410420' . $num_articulo;

        //////////////////////////////////////////////////////////




        //Puede q se cambie los selec entonces el nombre debe cambiar
        $nom1=$request->get('tipo');
        $nom2=$request->get('marca');
        $nom3=$request->get('material');
        $nom8=$request->get('club');
        $nom4=$request->get('sexo');
        $nom5=$request->get('talla');
      //  $nom6=$request->get('codigo');
        $nom6=$num_articulo;
        $nom7=$request->get('color');

        $nom_concat= $nom1. " " .$nom2. " " .$nom3. " " .$nom8. " " .$nom4. " " .$nom5 . $nom6 . "/" .$nom7;
        $articulo->nombre=$nom_concat;


        //el codigo no es editable, pero si se cargara :D

        //Imagenes

        if (Input::hasFile('imagen')){
        	$file=Input::file('imagen');
        	$file->move(public_path().'/imagenes/articulos/',$file->getClientOriginalName());
            $articulo->imagen=$file->getClientOriginalName();
        }

        if (Input::hasFile('imagen1')){
        	$file=Input::file('imagen1');
        	$file->move(public_path().'/imagenes/articulos/',$file->getClientOriginalName());
            $articulo->imagen1=$file->getClientOriginalName();
        }

         if (Input::hasFile('imagen2')){
        	$file=Input::file('imagen2');
        	$file->move(public_path().'/imagenes/articulos/',$file->getClientOriginalName());
            $articulo->imagen2=$file->getClientOriginalName();
        }

         if (Input::hasFile('imagen3')){
        	$file=Input::file('imagen3');
        	$file->move(public_path().'/imagenes/articulos/',$file->getClientOriginalName());
            $articulo->imagen3=$file->getClientOriginalName();
        }

        if (Input::hasFile('imagen4')){
        	$file=Input::file('imagen4');
        	$file->move(public_path().'/imagenes/articulos/',$file->getClientOriginalName());
            $articulo->imagen4=$file->getClientOriginalName();
        }


        $articulo->update();
     //   Session::flash('update','Se ha actualizado correctamente el articulo');
        Alert::success('El articulo se editó correctamente', 'Mensaje del Sistema')->persistent("Close");
        return Redirect::to('almacen/articulo');
    }
    public function destroy($id)
    {
        $articulo=Articulo::findOrFail($id);
        $articulo->estado='Inactivo';
        $articulo->update();
          Alert::success('Se cambio el estado correctamente', 'Mensaje del Sistema')->persistent("Close");
        return Redirect::to('almacen/articulo');

        foreach ($variable as $key => $value) {
          # code...
        }
    }

      public function barras($id)
    {

        $articulo=DB::table('articulo as a')
            ->join('categoria as c','a.idcategoria','=','c.idcategoria')
            ->join('subcategoria as sc','a.idsubcategoria','=','sc.idsubcategoria')
            ->select('a.nombre','a.codigo','a.nombre','c.nombre as nom_cat','sc.nombre as nom_subcat','a.imagen','a.imagen1','a.imagen2','a.imagen3','a.imagen4','a.stokmin','a.color','a.sexo','a.edad','a.tipo','a.material','a.talla','a.descripcion','a.marca','a.club')
            ->where('a.idarticulo','=',$id)
            ->get();

   //  return Redirect::to('almacen/articulo',["articulo"=>$articulo]);
        return view("almacen.articulo.barras",["articulo"=>$articulo]);
    }


}
