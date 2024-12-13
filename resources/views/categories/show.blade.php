@extends('layouts.app')

@section('content')
    <h1>Category: {{ $category->name }}</h1>
    <p><strong>Slug:</strong> {{ $category->slug }}</p>
    <hr>
    <h2>Blog Posts</h2>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Title</th>
            <th>Description</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($blogPosts as $post)
            <tr>
                <td>{{ $post->title }}</td>
                <td>{{ $post->description }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
