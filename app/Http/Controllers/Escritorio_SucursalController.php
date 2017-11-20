<?php

namespace sisVentas\Http\Controllers;

use Illuminate\Http\Request;

use sisVentas\Http\Requests;

use DB;
use Auth;
use Alert;
use Carbon\Carbon;
use Response;

class Escritorio_SucursalController extends Controller
{
  public function __construct()
 {
     $this->middleware('auth');
 }
 public function index()
 {
     return view('escritorio_suc',[]);
 }
}
