<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProduactRequestApi extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'cate_name' => 'required|string',
            'price' => 'numeric|nullable|sometimes',
            'size_id' => 'numeric|nullable|sometimes',
            'cate_image' => 'nullable',
            'cate_disc' => 'nullable|sometimes|string',
            'cate_id' => '',
            //   'color_name' => 'string|nullable|sometimes',

        ];
    }
}
