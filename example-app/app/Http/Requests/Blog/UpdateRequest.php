<?php

namespace App\Http\Requests\Blog;

use App\Http\Requests\Request;

class UpdateRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_id' => ['required', 'integer', 'exists:users,id'],
            'title' => ['required', 'string'],
            'contents' => ['required', 'string'],
            'categories' => ['nullable', 'array'],
            'categories.*.id' => ['required', 'integer', 'exists:categories,id', 'distinct']
        ];

    }
}

