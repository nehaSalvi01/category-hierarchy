  @extends('layout.master')
@section('content')
  <div class="container">
        <h1>Category Tree</h1>
        <ul class="list-group">
            @foreach($categoryTree as $category)
                @include('categories.category_node', ['category' => $category])
            @endforeach
        </ul>
    </div>
    @endsection