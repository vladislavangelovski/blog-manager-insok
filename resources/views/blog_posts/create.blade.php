@extends('layouts.app')

@section('content')
    <h1>{{ isset($blogPost) ? 'Edit Blog Post' : 'Create Blog Post' }}</h1>
    <form method="POST" action="{{ isset($blogPost) ? route('blog_posts.update', $blogPost->id) : route('blog_posts.store') }}">
        @csrf
        @if (isset($blogPost))
            @method('PUT')
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" id="title" value="{{ old('title', $blogPost->title ?? '') }}">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control" id="description">{{ old('description', $blogPost->description ?? '') }}</textarea>
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label>
            <select name="category_id" class="form-select">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id', $blogPost->category_id ?? '') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Save</button>
    </form>
@endsection
