<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class EnterpriseRequest extends FormRequest
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
            'name' => 'required',

            'cep' => 'required|min:8|max:9',
            'street' => 'required',
            'number' => 'required',
            'neighborhood' => 'required',
            'complement' => 'nullable',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => __('Esse campo é obrigatório'),

            'cep.required' => __('O CEP é obrigatório'),
            'street.required' => __('O Rua é obrigatório'),
            'number.required' => __('O Número é obrigatório'),
            'neighborhood.required' => __('O Bairro é obrigatório'),
        ];
    }

}
