@extends('layout.master')
@section('content')
<div class="container mt-3">
    <h2 class="mb-4">Edit SubCategory</h2>

    @if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form method="POST" action="{{ route('subcategories.update', $category->id) }}">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{ $category->id }}">
        <div class="mb-3">
            <label for="name" class="form-label">Category Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $category->name) }}">
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="parent_id" class="form-label">Parent Category (Optional)</label>
            <select class="form-select" id="parent_id" name="parent_id">
         <select name="parent_id">
    @foreach ($parentCategories as $parentCategory)
        <option value="{{ $parentCategory->id }}" @if($parentCategory->id == $category->parent_id) selected @endif>
            {{ $parentCategory->name }}
        </option>
    @endforeach
</select>
        </div>

        <button type="submit" class="btn btn-primary">Update Category</button>
        <a href="{{ route('subcategories.index') }}" class="btn btn-md btn-secondary">Back</a>
    </form>
</div>
@endsection
