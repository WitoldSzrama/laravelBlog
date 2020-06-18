@extends('layouts.app')

@section('content')
    <form action="/posts/{{ $post->id }}/edit" method="POST">
        @include('forms.postForm')
    </form>
@endsection
