<?php

namespace sisVentas\Http\Requests;

use sisVentas\Http\Requests\Request;

class Articulo2FormRequest extends Request
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'val_stock'=>'required|numeric',//si o si obligatorio
            'val_uni'=>'required|numeric', //dafault 0
            'st_min'=>'required|numeric'
        ];
    }
}
