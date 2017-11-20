<?php

namespace sisVentas;

use Illuminate\Database\Eloquent\Model;

class Subcategoria extends Model
{
    protected $table='subcategoria';

    protected $primaryKey='idsubcategoria';

    public $timestamps=false;


    protected $fillable =[
    	'nombre',
    	'estado',
      'idcategoria'

    ];

    protected $guarded =[

    ];
}
