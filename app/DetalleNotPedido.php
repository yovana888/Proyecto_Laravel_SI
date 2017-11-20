<?php

namespace sisVentas;

use Illuminate\Database\Eloquent\Model;

class DetalleNotPedido extends Model
{

      protected $table='detalle_pedido';
      protected $primaryKey='iddetalle_pedido';
      public $timestamps=false;

      protected $fillable =[
        'idnotificacion_pedido',
        'idarticulo',
        'cantidad',
        'pp',
        'idsucursal',
        'cant_pp',
        'idproveedor',
      
      ];
      protected $guarded =[
      ];
}
