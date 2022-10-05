<?php

namespace App\Http\Requests\Todo;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class TodoRequest extends FormRequest
{
    /**
     * @var mixed
     */


    public function authorize(): bool
    {

        return true;
    }

    public function rules(): array
    {
        return [
            'task' => ['required', '', 'max:255'],
        ];
    }

    public function payload(): array
    {
        return array_merge($this->only(['task']), [
            'user_id' => $this->user()->id,
            'status' => 1
        ]);
    }
}
