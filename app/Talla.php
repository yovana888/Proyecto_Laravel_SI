<?php

namespace sisVentas;

use Illuminate\Database\Eloquent\Model;

class Talla extends Model
{
    protected $table='talla';

    protected $primaryKey='idtalla';

    public $timestamps=false;


    protected $fillable =[
        'idsubcategoria',
    	'nombre',
    	'estado'
        
    ];

    protected $guarded =[

    ];
}
