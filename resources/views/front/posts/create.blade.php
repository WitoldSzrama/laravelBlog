@extends('layouts.app')

@section('content')
    <form method="POST">
        @include('forms.postForm')
    </form>
@endsection
