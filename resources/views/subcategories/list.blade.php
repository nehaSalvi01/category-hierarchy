@extends('layout.master')
@section('content')
    <!-- Content -->
    <div class="container mt-3">
        <h2 class="mb-4 d-flex justify-content-between align-items-center">
            Subcategories List
            <a href="{{ route('subcategories.create') }}" class="btn btn-primary">Create New SubCategory</a>
        </h2>
        <table class="table table-striped" id="" class="display" style="border: 1px solid var(--bs-gray-400);">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">SubCategory Name</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">Date</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <th scope="row">{{ $category->id }}</th>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->parentCategory->name??'-' }}</td>
                        <td>{{ $category->created_at }}</td>
                        <td>
                            <a href="{{ route('subcategories.show', $category) }}" class="btn btn-sm btn-secondary"><i
                                    class="fa fa-solid fa-eye"></i></a>
                            <a href="{{ route('subcategories.edit', $category) }}" class="btn btn-sm btn-success"><i
                                    class="fa fa-solid fa-edit"></i></a>
                            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                data-bs-target="#deleteCategoryModal{{ $category }}">
                                <i class="fa fa-solid fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="deleteCategoryModal{{ $category->id }}" tabindex="1"
        aria-labelledby="deleteCategoryModalLabel{{ $category->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteCategoryModalLabel{{ $category->id }}">Confirm Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete the category "{{ $category->name }}"? This action cannot be undone.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <form method="POST" action="{{ route('subcategories.destroy', $category->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete Category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
