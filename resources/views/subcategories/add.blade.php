@extends('layout.master')
@section('content')
    <!-- Content -->
    <div class="container mt-3">
        <h2 class="mb-4">Add SubCategory</h2>
        <form method="POST" action="{{ route('subcategories.store') }}">
            @csrf
            <div class="mb-3">
                <label for="parent_id" class="form-label">Select Category</label>
                <select class="form-select" id="parent_id" name="parent_id">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">SubCategory Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    value="{{ old('name') }}">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Add</button>
            <a href="{{ route('subcategories.index') }}" class="btn btn-md btn-secondary">Back</a>
        </form>

    </div>
@endsection
