<?php

namespace sisVentas;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table='persona';

    protected $primaryKey='idpersona';

    public $timestamps=false;


    protected $fillable =[
    	'tipo_persona',
    	'nombre',
    	'ruc',
    	'num_documento',
    	'direccion',
    	'telefono',
    	'email',
        'idsucursal',
        'estado',
        'cuenta'
    ];

    protected $guarded =[

    ];
}
