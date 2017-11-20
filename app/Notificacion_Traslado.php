<?php

namespace sisVentas;

use Illuminate\Database\Eloquent\Model;

class Notificacion_Traslado extends Model
{
     protected $table='notificacion_traslado';

    protected $primaryKey='idnotificacion_traslado';

    public $timestamps=false;


    protected $fillable =[
    	'idemisor',
    	'idreceptor',
        'fecha_hora',
        'nota',
        'estado',
        'nuevo'
        
    ];

    protected $guarded =[

    ];
}
