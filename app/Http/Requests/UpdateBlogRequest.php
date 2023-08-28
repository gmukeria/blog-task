<?php

namespace App\Http\Requests;

use App\Models\Blog;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateBlogRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $blog = Blog::find($this->route('id'));
        return $blog && $this->user()->can('update', $blog);
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|string|max:200',
            'desc' => 'required|string|max:240',
            'image_middle' => 'required|string|max:240',
            'image_large' => 'required|string|max:240',
            'text' => 'required|string',
        ];
    }
}
