<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CardRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
        'produact_id'    => 'required',
        'seller_id'      => 'required',
        'clint_id'       => 'required',
        'process_id'     => '',
        'city_id'        => 'required',
        'area_id'        => '',
        'quantity'       => 'required',
        'price'          => 'required',
        'total'          => '',
        'stutus'         => '',
            
            //required 
        ];
    }
}