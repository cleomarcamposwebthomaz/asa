<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BannerRequest extends FormRequest
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
        $required = $this->route('banner') ? 'required' : 'nullable';

        return [
            'banner_type_id' => 'required',
            'name' => 'required',
            'image' => $required,
            'image_mobile' => 'nullable',
        ];
    }
}