<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends FormRequest
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
            "ime" =>'required|min:3|max:50',
            "prezime" => 'required|min:3|max:50',
            "email" => 'required|unique:osoba,email|email|ends_with:@gmail.com',
            "lozinka" => ['required', Password::min(8)->letters()->numbers()],
            "lozinka2" => 'required|same:lozinka'
        ];
    }
}
