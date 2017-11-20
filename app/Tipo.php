<?php

namespace sisVentas;

use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
     protected $table='tipo';

    protected $primaryKey='idtipo';

    public $timestamps=false;


    protected $fillable =[
        'idsubcategoria',
    	'nombre',
    	'estado'
        
    ];

    protected $guarded =[

    ];
}
