<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
        $id = $this->route('setting');

        return [
            'name' => 'required|unique:settings,name,' . $id,
            'label' => 'required',
            'public_name' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Esse campo é obrigatório',
            'name.unique' => 'Já existe uma configuração com esse nome',
            'label.required' => 'Esse campo é obrigatório',
            'public_name.required' => 'Esse campo é obrigatório',
        ];
    }

}