<?php

namespace App\Http\Livewire\Article;

use App\Models\Article;
use Livewire\Component;
use Illuminate\Support\Str;

class ArticleAddComponent extends Component
{
    public $title;
    public $content;
    public $slug;

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'title'=> ['required', 'min:3', 'max:30', 'string', 'unique:articles'],
            'content'=> ['required', 'min:3', 'string'],
        ]);
    }

    public function store()
    {
        $this->validate([
            'title'=> ['required', 'min:3', 'max:30', 'string', 'unique:articles'],
            'content'=> ['required', 'min:3', 'string'],
        ]);

        $article = new Article();
        $article->title = $this->title;
        $article->slug = Str::slug($this->title);
        $article->content = $this->content;
        $article->save();

        return redirect()->to(route('article.index'));
    }

    public function render()
    {
        return view('livewire.article.article-add-component')->layout('layouts.base');
    }
}
