<div>
    @section('title', 'Article')
    <a href="{{ route('article.create') }}">Create new Article</a>
    <div class="flex flex-col mt-6">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <div class="overflow-hidden border-b border-gray-200 rounded-md shadow-md">
                    <table class="min-w-full overflow-x-scroll divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Content</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        <tbody>
                            @forelse($articles as $article)
                            <tr>
                                <td>{{ $article->title }}</td>
                                <td>{{ \Illuminate\Support\Str::limit($article->content, 50, $end='...') }}</td>
                                <td>{{ $article->created_at }}</td>
                                <td>
                                    <a href="{{ route('article.show',['slug' => $article->slug]) }}">Show</a>
                                    <a href="{{ route('article.edit', ['article_id'=>$article->id]) }}">Edit</a>
                                    <a href="#" class="btn btn-danger btn-sm text-light"
                                        onclick="confirm('Are you sure, You want to delete this article?') || event.stopImmediatePropagation()"
                                        wire:click.prevent="destroy({{ $article->id }})">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

</div>
