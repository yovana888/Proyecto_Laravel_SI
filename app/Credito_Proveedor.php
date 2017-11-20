<?php

namespace sisVentas;

use Illuminate\Database\Eloquent\Model;

class Credito_Proveedor extends Model
{
  protected $table='credito_proveedor';

 protected $primaryKey='idcredito';

 public $timestamps=false;


 protected $fillable =[
   'idcompra',
     'total',
     'estado',
     'resto',
     'fecha_px',
     'cant_letras'
 ];

 protected $guarded =[

 ];
}
