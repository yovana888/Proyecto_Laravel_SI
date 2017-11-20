<?php

namespace sisVentas\Http\Controllers;

use sisVentas\Http\Requests;
use Illuminate\Http\Request;
use Auth;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

  
    public function index()
    {       //se manda el idesucursal pq cuando haga clic obtendremos a q sucursal accedio,
           //claro esta q lo ocultaremos la columna
          $user=Auth::user()->id;
          $sucu=DB::table('sucursal as s')
                ->join('user_sucursal as us','us.idsucursal','=','s.idsucursal')
                ->select('s.razon','s.logo','us.tipo_user','s.idsucursal','us.estado','s.tipo')
                ->where('us.iduser','=',$user)
                ->where('us.estado','=','Activo')
                ->where('s.estado','=','Activo')
                ->orderBy('s.idsucursal','desc')
              ->get();
            return view('home',["sucu"=>$sucu]);
    }
    

}
