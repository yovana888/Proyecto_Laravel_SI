<?php

namespace sisVentas\Http\Requests;

use sisVentas\Http\Requests\Request;

class DetalleCreditoFormRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    
    public function rules()
    {
        return [
            'monto'=>'required'
            
        ];
    }
}
