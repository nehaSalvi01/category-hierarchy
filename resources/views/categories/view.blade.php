@extends('layout.master')
@section('content')
    <!-- Content -->
    <div class="container mt-3">
        <h1>Category Details</h1>
        <div class="card mb-3">
            <div class="card-body">
                <p class="card-text"><b>Name:</b> {{ $category->name }}</p>
            </div>
        </div>
        <a href="{{ route('categories.index') }}" class="btn btn-md btn-secondary">Back</a>
    </div>
@endsection
<!-- Content -->
