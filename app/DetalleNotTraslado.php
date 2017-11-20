<?php

namespace sisVentas;

use Illuminate\Database\Eloquent\Model;

class DetalleNotTraslado extends Model
{
    protected $table='detalle_traslado';

    protected $primaryKey='iddetalle_traslado';
    public $timestamps=false;

    protected $fillable =[
    	'idnotificacion_tras',
    	'idarticulo',
    	'cantidad',
    	'precio_venta',
    	'cantidad_volumen1',
        'precio_mayor1',
        'cantidad_volumen2',
        'precio_mayor2',
        'cantidad_volumen2',
        'precio_mayor2'
    ];
    protected $guarded =[
    ];
}
