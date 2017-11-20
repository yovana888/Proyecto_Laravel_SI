<?php

namespace sisVentas\Http\Controllers;

use Illuminate\Http\Request;
use sisVentas\Http\Requests;
use DB;
use sisVentas\User;
use Auth;
use Illuminate\Support\Facades\Redirect;

class RedireccionarController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

    public function designar($id_act, $role, $id_a){

        //ahora el id que se recibe como parametro en lo usaremos para hacer la consulta y hacer un update
        //extraemos el id del usuario actual
        //bueno ahora veremos para el tipo, algo mas ver el  estado del usuario,
        //si esta inactivo en si q no le liste esa sucursal o almacen, ver si hago bien el update :t

        $user=Auth::user()->id;

           $act=DB::table('user_sucursal as us')
            ->select('us.m_almacen','us.m_compras','us.m_traslado','us.m_pedido','us.m_movimiento','us.m_caja','us.m_kardex','us.m_venta')
            ->where('us.iduser', $user )
            ->where('us.idsucursal',$id_a)
            ->first();

           DB::table('users as u')
           ->where('u.id', $user )
           ->update(['u.s_actual' =>$id_act,'u.rol_actual' =>$role,'u.id_s' =>$id_a,'u.m_almacen' =>$act->m_almacen,'u.m_compras'=>$act->m_compras,'u.m_traslado'=>$act->m_traslado,'u.m_pedido'=>$act->m_pedido,'u.m_movimiento'=>$act->m_movimiento,'u.m_caja'=>$act->m_caja,'u.m_kardex'=>$act->m_kardex,'u.m_venta'=>$act->m_venta]);

        if($id_a=='3'){
           return Redirect::to('escritorio');
        }else{
           return Redirect::to('escritorio_suc');
        }



    }
}
