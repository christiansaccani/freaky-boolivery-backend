<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDishRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [

            'name' => 'required|max:255',
            'image' => 'nullable|max:1000|mimes:jpg,bmp,png',
            'description' => 'nullable|max:3000',
            'ingredients' => 'required|max:255',
            'price' => 'required|numeric|between:0,3000.99',

        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => "Il piatto deve avere un nome",
            'name.max' => "Il piatto può avere massimo 255 caratteri",

            'image.max' => "L'immagine può avere massimo 1000 caratteri",
            'image.mimes' => "L'immagine deve essere un jpg,bmp o png",

            'description.max' => 'La descrizione può essere di massimo 3000 caratteri',

            'ingredients.required' => 'Il piatto deve avere degli ingredienti',
            'ingredients.max' => 'Gli ingredienti possono avere massimo 255 caratteri',

            'price.required' => 'Devi aggiungere un prezzo',
            'price.numeric' => 'Il prezzo deve essere un numero',
            'price.between' => 'Il prezzo deve essere compreso tra 0 e 3000.99',
        ];
    }
}
