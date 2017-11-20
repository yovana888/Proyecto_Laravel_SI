<?php

namespace sisVentas;

use Illuminate\Database\Eloquent\Model;

class Edad extends Model
{
     protected $table='edad';

    protected $primaryKey='idedad';

    public $timestamps=false;


    protected $fillable =[
    	'nombre',
    	'estado'
    ];

    protected $guarded =[

    ];
}
