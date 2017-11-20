<?php

namespace sisVentas;

use Illuminate\Database\Eloquent\Model;

class Sucursal_User extends Model
{
     protected $table='user_sucursal';

    protected $primaryKey='iduser_sucursal';
    
    protected $fillable = [
        'iduser', 'idsucursal', 'fecha','estado','tipo_user','m_almacen','m_compras','m_traslado','m_pedido','m_movimiento','m_caja','m_kardex','m_venta'
    ];

   
}
