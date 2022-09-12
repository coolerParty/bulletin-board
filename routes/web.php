<?php

use App\Http\Livewire\Article\ArticleAddComponent;
use App\Http\Livewire\Article\ArticleComponent;
use App\Http\Livewire\Article\ArticleEditComponent;
use App\Http\Livewire\Article\ArticleShowComponent;
use App\Http\Livewire\HomeComponent;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', HomeComponent::class)->name('home');
Route::get('/articles', ArticleComponent::class)->name('article.index');
Route::get('/article/add', ArticleAddComponent::class)->name('article.create');
Route::get('/article/{article_id}/edit', ArticleEditComponent::class)->name('article.edit');
Route::get('/article/{slug}', ArticleShowComponent::class)->name('article.show');





Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
