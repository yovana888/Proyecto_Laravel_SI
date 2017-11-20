<?php

namespace sisVentas;

use Illuminate\Database\Eloquent\Model;

class Movimiento extends Model
{
   protected $table='movimiento';

    protected $primaryKey='idmovimiento';

    public $timestamps=false;


    protected $fillable =[
    	'idarticulo',
        'tipo_movimiento',
        'motivo',
        'fecha_mov',
        'cantidad',
        'estado',
        'nota',
        'idsucursal',
        

    ];

    protected $guarded =[

    ];
}
