<?php

namespace sisVentas;

use Illuminate\Database\Eloquent\Model;

class Detalle_Credito_Pr extends Model
{
  protected $table='detalle_credito_proveedor';

 protected $primaryKey='iddetalle_credito';

 public $timestamps=false;


 protected $fillable =[
   'idcredito',
     'fecha_pago',
     'monto'

 ];

 protected $guarded =[

 ];
}
