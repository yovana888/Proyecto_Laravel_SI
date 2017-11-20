<?php
namespace sisVentas;
use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    protected $table='articulo';

    protected $primaryKey='idarticulo';

    public $timestamps=false;


    protected $fillable =[
    	'idcategoria',
    	'nombre',
    	'descripcion',
    	'imagen',
    	'estado',
      'subcategoria',
      'material',
      'etiqueta'  
    ];

    protected $guarded =[

    ];
}
