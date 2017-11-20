<?php

namespace sisVentas\Http\Controllers;

use Illuminate\Http\Request;
use sisVentas\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use sisVentas\Http\Requests\DetalleFormRequest;
use sisVentas\DetalleProveedor;
use DB;
use Alert;


class DetalleProveedorController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    
     public function create()
    {
      //nada pz por se modal :v 
    }
    public function store (DetalleFormRequest $request)
    {
        $detalle=new DetalleProveedor;
        $detalle->idarticulo=$request->get('idarticulo');
        $detalle->idproveedor=$request->get('proveedor');
        $detalle->save();
          Alert::success('El artículo ha sido agregado correctamente', 'Mensaje del Sistema')->persistent("Close");
        return Redirect::to('compras/proveedor');
        
        
    }
}
