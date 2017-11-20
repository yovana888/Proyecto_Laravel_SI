<?php

namespace sisVentas;

use Illuminate\Database\Eloquent\Model;

class Articulo2 extends Model
{
   protected $table='traslado';

    protected $primaryKey='idtraslado';

    public $timestamps=false;

     protected $fillable =[

       'idarticulo',
     	'stock',
     	'estado',
       'stockmin',
       'cantidad_detalle',
       'precio_venta',
       'cantidad_volumen1',
       'cantidad_volumen2',
       'cantidad_volumen3',
       'precio_mayor1',
       'precio_mayor2',
       'precio_mayor3',
       'fecha_hora',
       'idsucursal',
       'precio_detalle'

    ];

}
