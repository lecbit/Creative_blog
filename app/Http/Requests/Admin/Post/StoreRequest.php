<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|string',
            'content' => 'required|string',
            'preview_image' => 'required|file',
            'main_image' => 'required|file',
            'category_id' => 'required|exists:categories,id',
            'tag_ids' => 'nullable|array',
            'tag_ids*' => 'nullable|integer|exists:tags,id'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Заполните строку',
            'title.string' => 'Должна быть типа строка',
            'content.required' => 'Заполните строку',
            'content.string' => 'Должна быть типа строка',
            'preview_image.required' => 'Заполните строку',
            'preview_image.file' => 'Должна быть типа файл',
            'main_image.required' => 'Заполните строку',
            'main_image.file' => 'Должна быть типа файл',
            'category_id.required' => 'Заполните строку',
            'category_id.exists' => 'Данная категория не существует',
            'tag_ids.array' => 'Должен быть типа массив',
            
        ];
    }
}
