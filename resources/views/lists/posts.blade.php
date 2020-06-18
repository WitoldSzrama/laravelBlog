<ul class="list-group-flush">
    @foreach($posts as $post)
        <li class="list-group-item">
            <form action="/posts/{{ $post->id }}" method="Post">

                <a class="btn btn-link" href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                @auth()
                    @if(Auth::id() === $post->user_id)
                        <a class="btn btn-sm btn-info" href="/posts/{{ $post->id }}/edit"> Edit </a>
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Delete</button>
                    @endif
                @endauth
            </form>
        </li>
    @endforeach
</ul>
{{ $posts->links() }}
