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
     <input type="hidden" name="id" value="{{ $category->id }}">  <div class="mb-3">
        <label for="parent_id" class="form-label">Category</label>
        <select class="form-select" id="parent_id" name="parent_id">
            <option value="0">Select Category</option>
            @foreach ($allCategories as $categoryOption)
                <option value="{{ $categoryOption->id }}" {{ $category->parent_id === $categoryOption->id ? 'selected' : '' }}>
                    {{ $categoryOption->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="name" class="form-label">SubCategory Name*</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') ?? $category->name }}">
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
</form>

</div>
@endsection
