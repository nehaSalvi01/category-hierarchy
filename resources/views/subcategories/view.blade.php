@extends('layout.master')
@section('content')
<div class="container mt-3">
    <h2>SubCategory Details</h2>
    <div class="card mb-3">
        <div class="card-body">
            <p class="card-text"><b>Category:</b> {{ $category->parentCategory ? $category->parentCategory->name : 'None' }}
            </p>
            <p class="card-text"><b>SubCategory Name:</b> {{ $category->name }}</p>
        </div>
    </div>
    <a href="{{ route('subcategories.index') }}" class="btn btn-md btn-secondary">Back</a>
 </div>
@endsection
