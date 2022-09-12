<div>
    <div class="container">
        <h1>{{ $article->title }}</h1>
        <p>
            {{ $article->content }}
        </p>
        <p>{{ $article->created_at }}</p>

        <div>
            <p>{{ $article->vote }}</p>
            <a href="#"  wire:click.prevent="increaseVote('{{ $article->id }}')">+</a>
            <a href="#"  wire:click.prevent="decreaseVote('{{ $article->id }}')">-</a>
        </div>
    </div>
</div>
