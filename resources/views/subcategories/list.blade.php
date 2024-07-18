@extends('layout.master')
@section('content')
    <!-- Content -->
    <div class="container mt-3">
        <h2 class="mb-4 d-flex justify-content-between align-items-center">
            Subcategory List
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
                @foreach($categories as $key=>$category)
                    <tr>
                        <th scope="row">{{$key+1}}</th>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->parentCategory->name ?? '-' }}</td>
                        <td>{{ $category->created_at }}</td>
                        <td>
                            <a href="{{ route('subcategories.show', $category) }}" class="btn btn-sm btn-secondary"><i
                                    class="fa fa-solid fa-eye"></i></a>
                            <a href="{{ route('subcategories.edit', $category) }}" class="btn btn-sm btn-success"><i
                                    class="fa fa-solid fa-edit"></i></a>
                             <button type="button" class="btn btn-sm btn-danger"onclick="deleteCategory({{ $category->id }})">
                                <i class="fa fa-solid fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function deleteCategory(id) {
        if (confirm("Are you sure you want to delete this subcategory?")) {
            $.ajax({
                url: '/subcategories/destroy/' + id,
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    alert('Category deleted successfully!');
                    // Optionally, you can reload the page or remove the deleted element from the DOM
                    location.reload();
                },
                error: function(xhr) {
                    alert('An error occurred while deleting the category.');
                }
            });
        }
    }
</script>


