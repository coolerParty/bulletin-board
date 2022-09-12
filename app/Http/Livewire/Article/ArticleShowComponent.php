<?php

namespace App\Http\Livewire\Article;

use App\Models\Article;
use Livewire\Component;

class ArticleShowComponent extends Component
{
    public $slug;
    public $votes;

    public function increaseVote($id)
    {
        $art = Article::find($id);
        $this->votes = $this->votes + 1;
        $art->vote = $this->votes;
        $art->save();
    }

    public function decreaseVote($id)
    {
        $art = Article::find($id);
        $this->votes = $this->votes - 1;
        $art->vote = $this->votes;
        $art->save();
    }

    public function mount($slug)
    {

        $this->slug = $slug;
    }

    public function render()
    {
        $article = Article::where('slug', $this->slug)->first();

        return view('livewire.article.article-show-component',['article'=>$article])->layout('layouts.base');
    }
}
