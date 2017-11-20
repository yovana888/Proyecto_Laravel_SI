<?php

namespace sisVentas\Http\Controllers;
use Illuminate\Http\Request;
use sisVentas\Http\Requests;
use sisVentas\Club;
use Illuminate\Support\Facades\Redirect;
use sisVentas\Http\Requests\ClubFormRequest;
use DB;


class ClubController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
  /*  public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $clubs=DB::table('club')->where('nombre','LIKE','%'.$query.'%')
            ->orderBy('idclub','desc')
            ->paginate(7);
            return view('almacen.club.index',["clubs"=>$clubs,"searchText"=>$query]);
        }
    }*/
    
     public function index()
    {
        
           
            $clubs=Club::all();
            return view('almacen/club/index')->with('clubs',$clubs);
       
    }
    
    
    public function create()
    {
      return view("almacen.club.create");
    }
    public function store (ClubFormRequest $request)
    {
        $club=new Club;
        $club->nombre=$request->get('nombre');
        $club->estado='Activo';
        $club->save();
        return Redirect::to('almacen/club');

    }
    public function show($id)
    {
        return view("almacen.club.show",["club"=>Club::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view("almacen.club.edit",["club"=>Club::findOrFail($id)]);
    }
    public function update(ClubFormRequest $request,$id)
    {
        $club=Club::findOrFail($id);
        $club->nombre=$request->get('nombre');
        $club->estado=$request->get('estado'); //si solo si ha sido desactivado si es asi pordra activarlo
        $club->update();
        return Redirect::to('almacen/club');
    }
    public function destroy($id)
    {
        $club=Club::findOrFail($id);
        $club->estado='Inactivo';
        $club->update();
        return Redirect::to('almacen/club');
    }
}
