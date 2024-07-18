  @extends('layout.master')
  @section('content')
      <div class="container">
          <h2>Category Tree</h2>
          <ul class="list-group">
              @foreach ($categoryTree as $category)
                  @include('categories.category_node', ['category' => $category])
              @endforeach
          </ul>
      </div>
  @endsection
