@extends('layouts.app')

@section('content')
    <a  class="btn btn-info m-3" href="/"> <- Go back to list</a>
    <h1>{{ $post->title }}</h1>

    @foreach($post->tags as $tag)
        <span class="badge badge-dark text-white">{{ $tag->tag }}</span>
    @endforeach
    <hr>
    <p> {{ $post->body }}</p>
    <hr>
    <p class="font-weight-bolder">Created by: {{ $post->user->name }}</p>
    <hr>
    <div class="list-group">
        @include('forms.commentForm')
        @foreach($comments as $comment)
            <div class="m-3">
                <p class="mb-1">{{ $comment->body }}</p>
                <hr>
                <div class="d-flex w-100 justify-content-between">
                    <small>{{ $comment->created_at->format('d-m-Y') }}</small>
                    <small>By: <b>{{ $comment->name }} </b></small>
                </div>
            </div>
        @endforeach
    </div>
    {{ $comments->links() }}

@endsection

