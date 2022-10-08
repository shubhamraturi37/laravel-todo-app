<?php

namespace App\Http\Requests\Todo;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class TodoLabelRequest extends FormRequest
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
            'priority' => ['nullable', '', 'max:255'],
            'notes' => ['nullable', '', 'max:255'],
            'due_date' => ['nullable'],
        ];
    }

    public function payload($todo): array
    {

        return array_merge($this->only(['priority','notes','due_date']), [
            'todo_id' => $todo->id
        ]);
    }
}
