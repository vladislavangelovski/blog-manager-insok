@extends('layouts.app')

@section('content')
    <h1>{{ isset($category) ? 'Edit Category' : 'Create Category' }}</h1>
    <form method="POST" action="{{ isset($category) ? route('categories.update', $category->id) : route('categories.store') }}">
        @csrf
        @if (isset($category))
            @method('PUT')
        @endif
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" id="name" value="{{ old('name', $category->name ?? '') }}">
        </div>
        <button type="submit" class="btn btn-success">Save</button>
    </form>
@endsection
