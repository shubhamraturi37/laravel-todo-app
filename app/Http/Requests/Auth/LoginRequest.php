<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize(): bool
    {

        return true;
    }

    public function rules(): array
    {
        return [
            'email' => ['required', 'email:strict', 'max:255'],
            'password' => ['required', 'string'],

        ];
    }

    public function credentials(): array
    {
        return $this->only(['email', 'password']);
    }
}
