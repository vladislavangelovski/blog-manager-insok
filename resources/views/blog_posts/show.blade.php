@extends('layouts.app')

@section('content')
    <h1>{{ $blogPost->title }}</h1>
    <p><strong>Category:</strong> {{ $blogPost->category->name }}</p>
    <p>{{ $blogPost->description }}</p>
@endsection
