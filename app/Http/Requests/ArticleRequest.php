<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool  //determine si l'utilisateur est autoriser a faire une requette
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array //contient les regles de validations
    {
        return [
            //
             'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,jpg,svg,gif,png|max:2028',
        ];
    }

    public function messages(){
        return[
            'title.required' => "Le titre est requis.",
        'title.string' => "Le titre doit être une chaîne de caractères.",
        'title.max' => "Le titre ne doit pas dépasser 255 caractères.",

        'description.required' => "La description est requise.",
        'description.string' => "La description doit être une chaîne de caractères.",

        'category.required' => "La catégorie est requise.",
        'category.string' => "La catégorie doit être une chaîne de caractères.",
        'category.max' => "La catégorie ne doit pas dépasser 255 caractères.",

        'image.image' => "Le fichier doit être une image.",
        'image.mimes' => "Les formats acceptés sont : jpeg, jpg, png, svg, gif.",
        'image.max' => "L'image ne doit pas dépasser 2 Mo.",
        ];
    }
}
