<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePracticeRequest extends FormRequest
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
            "title" => "required|string|min:3|max:40",
            "reason" => "required|string|max:255",
        ];
    }

    public function messages()
    {
        return [
            'title.min' => __('Veuiller vérifier que la taille minimum du titre est de 3 caractères!'),
            'title.max' => __('Veuiller vérifier que la taille minimum du titre est de 40 caractères!'),
            'title.required' => __('Il vous faut indiquer un titre !'),
            'reason.required' => __("Vous devez indiquer la raison du changement !"),
        ];
    }
}
