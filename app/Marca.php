<?php

namespace sisVentas;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    protected $table='marca';

    protected $primaryKey='idmarca';

    public $timestamps=false;


    protected $fillable =[
    	'nombre',
    	'estado'
    ];

    protected $guarded =[

    ];
}
