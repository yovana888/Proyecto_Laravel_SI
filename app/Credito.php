<?php

namespace sisVentas;

use Illuminate\Database\Eloquent\Model;

class Credito extends Model
{
     protected $table='credito';

    protected $primaryKey='idcredito';

    public $timestamps=false;


    protected $fillable =[
    	'idventa',
        'total',
        'estado',
        'resto',
        'fecha_px',
        'idsucursal'
        
    ];

    protected $guarded =[

    ];
}
