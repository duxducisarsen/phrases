<?php

namespace DuxDucisArsen\Phrases\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PhraseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('createOrEdit', DuxDucisArsen\Phrases\Models\Phrase::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'phrase'             => 'required|string|max:65000',
            'is_private'  => 'required|integer|max:1|min:0'
        ];
    }
}
