<?php

namespace sisVentas;
use Illuminate\Database\Eloquent\Model;

class Notificacion_Pedido extends Model
{
   protected $table='notificacion_pedido';

   protected $primaryKey='idnotificacion_pedido';

   public $timestamps=false;


   protected $fillable =[
     'idemisor',
     'fecha_hora',
     'nota',
     'estado',
     'pedido_prov'
   ];
   protected $guarded =[

   ];
}
