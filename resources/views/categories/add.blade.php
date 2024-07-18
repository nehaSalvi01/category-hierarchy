@extends('layout.master')
@section('content')
<!-- Content -->
<div class="container mt-3">
    <h2 class="mb-4">Add Category</h2>
  <form method="POST" action="{{ route('categories.store') }}">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Category Name</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    {{-- <div class="mb-3">
        <label for="parent_id" class="form-label">Parent Category (Optional)</label>
        <select class="form-select" id="parent_id" name="parent_id">
            <option value="">None</option>
            @foreach ($parentCategories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div> --}}

    <button type="submit" class="btn btn-primary">Create Category</button>
    <a href="{{ route('categories.index') }}" class="btn btn-md btn-secondary">Back</a>
</form>
    
</div>
@endsection
