<?php

namespace sisVentas;

use Illuminate\Database\Eloquent\Model;

class Tipo_Movimiento extends Model
{
  protected $table='tipo_movimiento';

  protected $primaryKey='idtipo_movimiento';

  public $timestamps=false;


  protected $fillable =[

    'nombre',
    'tipo_mov'

  ];

  protected $guarded =[

  ];
}
