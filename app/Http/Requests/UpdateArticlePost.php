<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Article;

class UpdateArticlePost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
//        $article = Article::find($this->route('article'));
//        return $article && $this->user()->can('update', $article);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|unique:articles,title,'.$this->route('article').'|max:255',
            'body' => 'required',
        ];
    }
}
