<li class="list-group-item">
    {{ $category->name }}
    @if (!empty($category->children))
        <ul class="list-group ms-3">
            @foreach ($category->children as $childCategory)
                @include('categories.category_node', ['category' => $childCategory])
            @endforeach
        </ul>
    @endif
</li>