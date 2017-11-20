<?php

namespace sisVentas;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $table='venta';

    protected $primaryKey='idventa';

    public $timestamps=false;

    protected $fillable =[
    	'idcliente',
    	'tipo_comprobante',
    	'serie_comprobante',
    	'num_comprobante',
    	'fecha_hora',
    	'impuesto',
    	'total_venta',
    	'estado',
        'iduser',
        'tipo_venta',
        'observacion',
        'num_guia',
        'serie_guia',
        'intnumero',
        'fecha_ven',
        'intnumero_guia',
        'orden',
        'referencia',
        'cambio',
        'p_partida',
        'p_llegada',
        'fecha_guia',
        'otros',
        'ruc_t',
        'non_t',
        'm_p',
        'licencia',
        'motivo',
        'tarjeta',
        'tipo_pago',
        'importe',
        'idsucursal'
        
        
    ];
    protected $guarded =[
    ];
}
