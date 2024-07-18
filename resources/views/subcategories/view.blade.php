@extends('layout.master')
@section('content')
<!-- Content -->
    <h1>Category Details</h1>
  <div class="card mb-3">
  <div class="card-body">
    <p class="card-text"><b>Name:</b> {{ $category->name }}</p>
    <p class="card-text"><b>Parent Category:</b> {{ $category->parentCategory->name : 'None' }}</p>
  </div>
</div>

<h6>Child Categories:</h6>
<ul class="list-group">
  @foreach ($category->children as $child)
    <li class="list-group-item">{{ $child->name }}</li>
  @endforeach
</ul>
    <a href="{{ route('subcategories.index') }}" class="btn btn-md btn-secondary">Back</a>
@endsection
<!-- Content -->
