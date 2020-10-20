<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BrokerRequest extends FormRequest
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
        $required = $this->route('broker') ? 'required' : 'nullable';

        return [
            'name' => 'required',
            'image' => $required . '|image|mimes:jpeg,png,jpg|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => __('Informe o nome do corretor'),
            'image.image' => __('Envie uma imagem válida'),
            'image.mimes' => __('Extensões válidas ( jpeg,png,jpg )'),
            'image.max' => __('Tamanho máximo 2mb'),
        ];
    }

}