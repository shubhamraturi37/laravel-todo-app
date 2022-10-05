<?php
namespace App\Http\Requests\Auth;
use App\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class RegisterRequest extends FormRequest{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'=>['required','string'],
            'email'=>['required','string','email:strict','max:255',Rule::unique(User::class)],
            'password'=>['required','string'],
        ];
    }
    public function payload(): array
    {
        return array_merge($this->only(['name', 'email']), [
            'password' => Hash::make($this->input('password')),
        ]);
    }


}
