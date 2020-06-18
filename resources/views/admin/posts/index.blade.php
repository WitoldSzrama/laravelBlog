@extends('layouts.app')

@section('content')
    @include('lists.posts')
    <a class="btn btn-success" href="/posts/create">Add new</a>
@endsection
