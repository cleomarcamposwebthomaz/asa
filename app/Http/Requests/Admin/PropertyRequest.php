<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PropertyRequest extends FormRequest
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
            'broker_id' => 'required',
            'city_id' => 'required',
            'state_id' => 'required',

            'name' => 'required',
            'price' => 'required|numeric',
            'price_promotional' => 'nullable',

            'garages' => 'required|numeric',
            'bathroom' => 'required|numeric',
            'bedrooms' => 'required|numeric',
            'suites' => 'required|numeric',

            'cep' => 'required|min:8|max:9',
            'street' => 'required',
            'number' => 'required|numeric',
            'neighborhood' => 'required',
            'complement' => 'nullable',

            'tags' => 'nullable',
        ];
    }

    public function messages()
    {
        return [
            'broker_id.required' => __('Selecione um corretor'),
            'state_id.required' => __('Selecione um estado'),
            'city_id.required' => __('Selecione uma cidade'),

            'garages.required' => __('Campo obrigatório'),
            'garages.numeric' => __('Apenas número'),
            'bathroom.required' => __('Campo obrigatório'),
            'bathroom.numeric' => __('Apenas número'),
            'bedrooms.required' => __('Campo obrigatório'),
            'bedrooms.numeric' => __('Apenas número'),
            'suites.required' => __('Campo obrigatório'),
            'suites.numeric' => __('Apenas número'),

            'name.required' => __('Informe o título do imóvel'),
            'price.required' => __('Informe o valor'),
            'cep.required' => __('O CEP é obrigatório'),
            'street.required' => __('O Rua é obrigatório'),
            'number.required' => __('O Número é obrigatório'),
            'number.numeric' => __('Apenas número'),

            'neighborhood.required' => __('O Bairro é obrigatório'),
            'tags.required' => __('Informe as tags')
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'price' => $this->getDecimalValue($this->price),
            'price_promotional' => $this->getDecimalValue($this->price_promotional),
        ]);
    }

    protected function getDecimalValue($value)
    {
        $value = str_replace('R', '', $value);
        $value = str_replace('$', '', $value);
        $value = str_replace('R$', '', $value);
        $value = str_replace('.', '', $value);
        $value = str_replace(',', '.', $value);

        if (empty($value)) {
            $value = 0;
        }

        return (float) $value;
    }
}
