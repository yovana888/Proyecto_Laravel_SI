<?php

namespace sisVentas;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table='users';

    protected $primaryKey='id';
    
    protected $fillable = [
        'name', 'email', 'password','dni','direccion','telefono','foto','estado','s_actual','rol_actual','id_s','m_almacen','m_compras','m_traslado','m_pedido','m_movimiento','m_caja','m_kardex','m_venta'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
