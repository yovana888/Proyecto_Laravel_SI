<?php

namespace sisVentas;

use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
    protected $table='sucursal';

    protected $primaryKey='idsucursal';

    public $timestamps=false;


    protected $fillable =[
    	'razon',
    	'direccion',
    	'ruc',
    	'representante',
    	'telefono',
    	'email',
        'logo',
        'estado',
        'moneda',
        'num_maquina'
    ];
}
