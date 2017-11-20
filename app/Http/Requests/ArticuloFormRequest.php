<?php

namespace sisVentas\Http\Requests;
use sisVentas\Http\Requests\Request;

class ArticuloFormRequest extends Request
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'idcategoria'=>'required',
            'descripcion'=>'max:512',
            'imagen'=>'mimes:jpeg,bmp,png',
            'subcategoria'=>'required',
            'etiqueta'=>'max:80',//lo mismo q modelo

        ];
    }
}
