<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title' => 'required|max:255',
            'description' => 'required|min:3',
            'category_id' => 'nullable|exists:categories,id',
            'tags' => 'nullable|exists:tags,id'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Per favore inserisci un titolo.',
            'title.max' => 'Il titolo non può essere più lungo di :max caratteri.',
            'description.required' => 'Per favore inserisci il corpo del post.',
            'description.min' => 'Il corpo del post deve essere lungo almeno :min caratteri.',
            'category_id.exists' => 'Categoria selezionata non valida.',
            'tags.exists' => 'Nessun tag presente con questo valore.'
        ];
    }
}
