<?php

namespace App\Http\Requests\Gallery;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class GalleryRequest extends FormRequest
{
    /**
     * @return bool
     */


    public function authorize(): bool
    {

        return true;
    }

    public function rules(): array
    {
        return array_merge([
            'title' => ['nullable', '', 'max:255'],
            'published_at' => ['nullable', '', 'max:255'],
        ], $this->galleryImage());
    }

    private function galleryImage(): array
    {
        return [
            'image' => [
                'bail',
                'required',
                'image',
                'dimensions:min_width=640,min_height=480',
                'mimes:jpeg,jpg,png',
                'max:4096', // KB
            ],
        ];
    }

    public function payload($todo): array
    {

        return array_merge($this->only(['priority', 'notes', 'due_date']), [
            'todo_id' => $todo->id
        ]);
    }
}
