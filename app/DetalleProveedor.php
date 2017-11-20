<?php

namespace sisVentas;

use Illuminate\Database\Eloquent\Model;

class DetalleProveedor extends Model
{
    protected $table='detalle_proveedor';

    protected $primaryKey='iddetalle_proveedor';

    public $timestamps=false;


    protected $fillable =[
        'idarticulo',
    	'idproveedor',
        
    ];

    protected $guarded =[

    ];
}
