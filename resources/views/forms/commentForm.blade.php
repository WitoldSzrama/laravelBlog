<form action="/posts/{{ $post->id }}/comments/create" method="Post">
    @csrf
    <div class="form-group">
        <input type="hidden" name="post_id" value="{{ $post->id }}">
        <div class="d-flex justify-content-between m-3">
            <div>
                <label for="name">Your name</label>
                <input class="" name="name" id="" value="@auth() {{ Auth::user()->name }} @endauth">
            </div>
            <button type="submit" class="btn btn-dark">Comment</button>
        </div>
        <textarea class="form-control" id="body" name="body"
                  rows="3">{{ old('body') }}</textarea>
    </div>
</form>

