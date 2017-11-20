<?php

namespace sisVentas;

use Illuminate\Database\Eloquent\Model;

class DetalleArticulo extends Model
{
  protected $table='detalle_articulo';

  protected $primaryKey='iddetalle_articulo';

  public $timestamps=false;


  protected $fillable =[
    'idarticulo',
    'estado',
    'codigo',
    'tam_tx',
    'UN1',
    'UN2',
    'tam_nro1',
    'tam_nro2',
    'color',
    'etiqueta',
    'medida_stock_gn',
    'num_stock_gn',
    'medida_stock_det',
    'num_stock_det',
    'stockmin',
    'precio_normal_u',
    'precio_det_u',
    'precio_vol1',
    'cantidad_vol1',
    'precio_vol2',
    'cantidad_vol2',
    'precio_vol3',
    'cantidad_vol3'
  ];

  protected $guarded =[

  ];
}
