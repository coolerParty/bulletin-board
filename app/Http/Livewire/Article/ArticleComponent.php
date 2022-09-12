<?php

namespace App\Http\Livewire\Article;

use App\Models\Article;
use Livewire\Component;

class ArticleComponent extends Component
{
    public function destroy($id)
    {
        $article = Article::find($id);
        $article->delete();
    }
    public function render()
    {
        $articles = Article::select('id','title','slug','content','created_at')->get();
        return view('livewire.article.article-component',['articles'=>$articles])->layout('layouts.base');
    }
}
