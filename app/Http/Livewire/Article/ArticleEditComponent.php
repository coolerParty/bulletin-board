<?php

namespace App\Http\Livewire\Article;

use App\Models\Article;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ArticleEditComponent extends Component
{
    public $article_id;
    public $title;
    public $content;

    public function mount($article_id)
    {
        $article = Article::find($article_id);
        if(empty($article))
        {
            abort(404);
        }
        $this->article_id = $article->id;
        $this->title      = $article->title;
        $this->content    = $article->content;

    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'title'=> ['required', 'min:3', 'max:30', 'string',
                     Rule::unique('articles')->ignore($this->article_id)],
            'content'=> ['required', 'min:3', 'string'],
        ]);
    }

    public function update()
    {
        $this->validate([
            'title'=> ['required', 'min:3', 'max:30', 'string',
                     Rule::unique('articles')->ignore($this->article_id)],
            'content'=> ['required', 'min:3', 'string'],
        ]);

        $article = Article::find($this->article_id);
        $article->title = $this->title;
        $article->slug = Str::slug($this->title);
        $article->content = $this->content;
        $article->save();

        return redirect()->to(route('article.index'));
    }

    public function render()
    {
        return view('livewire.article.article-edit-component')->layout('layouts.base');
    }
}
