<?php

namespace sisVentas;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $table='material';

    protected $primaryKey='idmaterial';

    public $timestamps=false;


    protected $fillable =[
        'idsubcategoria',
    	'nombre',
    	'estado'
        
    ];

    protected $guarded =[

    ];
}
