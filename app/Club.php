<?php

namespace sisVentas;

use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
     protected $table='club';

    protected $primaryKey='idclub';

    public $timestamps=false;


    protected $fillable =[
    	'nombre',
    	'estado',
        
    ];

    protected $guarded =[

    ];
}
