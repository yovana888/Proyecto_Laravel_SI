<?php

namespace sisVentas;

use Illuminate\Database\Eloquent\Model;

class DetalleIngreso extends Model
{
    protected $table='detalle_ingreso';

    protected $primaryKey='iddetalle_ingreso';
    public $timestamps=false;

    protected $fillable =[
    	'idingreso',
    	'idarticulo',
    	'cantidad',
    	'precio_compra',
    	'importe',
      'tipo_igv',
      'descuento',
      'precio_real',
      'cantidad_detalle',
      'medida',
      'precio_real_uni'
    ];
    protected $guarded =[
    ];
}
