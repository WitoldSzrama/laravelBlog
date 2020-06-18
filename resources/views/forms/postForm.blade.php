@csrf
@if($post->id)
    @method('PUT')
@endif
<div class="form-group">
    <label for="title">Post Title</label>
    <input class="form-control" id="title" name="title"
           value="{{ $post->title ? $post->title : old('title') }}" placeholder="title...">
</div>
<div class="form-group">
    <label for="title">Tags</label>
    <input class="form-control" id="title" name="tags"
           value="{{ $post->stringTags() ? $post->stringTags() : old('tags') }}" placeholder="tags...">
    <small>seperate tags with space</small>
</div>
<div class="form-group">
    <label for="body">Post content</label>
    <textarea class="form-control" id="body" name="body"
              rows="3">{{ $post->body ? $post->body : old('body') }}</textarea>
</div>
<button type="submit" class="btn btn-dark">{{ $post->id ? 'Edit' : 'Create' }}</button>
