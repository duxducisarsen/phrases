<?php

namespace DuxDucisArsen\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FraseInspiracionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('createOrEdit', App\Models\FraseInspiracion::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'frase'             => 'required|string|max:65000',
            'nivel_privacidad'  => 'required|integer|max:1|min:0'
        ];
    }
}
