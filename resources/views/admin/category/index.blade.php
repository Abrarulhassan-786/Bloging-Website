@extends('layouts.master')

@section('title', 'View Category')

@section('content')
    <!-- Modal -->
    <div class="modal fade" id="deleteModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('admin.delete_category') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Confirm Deletion</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <input type="hidden" class="form-control" name="category_delete_id" id="categoryid">
                    <div class="modal-body">
                        Are you sure you want to delete this category? This action cannot be undone.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    

    <div class="container-fluid px-4">
        @if (session('messageCategory'))
            <div class="alert alert-success">{{ session('messageCategory') }}</div>
        @endif
        <div class="container mt-5">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="mb-0">View Category</h2>
                <a href="{{ route('admin.add_category') }}" class="btn btn-primary">Add Category</a>
            </div>
            <table class="table table-striped table-bordered" id="mydataTable">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Category Name</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($category as $categories)
                        <tr>
                            <td>{{ $categories->id }}</td>
                            <td>{{ $categories->name }}</td>
                            <td>
                                <img src="{{ asset('upload/category/' . $categories->image) }}" width="50px"
                                    height="50px" alt="image">
                            </td>
                            <td>{{ $categories->status == '0'?'Visible':'Hidden' }}</td>
                            <td>
                                <a href="{{ route('admin.edit_category', ['id' => $categories->id]) }}"
                                    class="btn btn-success btn-sm">Edit</a>
                                {{-- <a href="{{route('admin.delete_category',['id'=>$categories->id])}}" class="btn btn-success btn-sm">Delete</a>  --}}
                                <button type="button" class="btn btn-danger btn-sm deletecategory"
                                    value="{{ $categories->id }} ">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            //this work only for current dom element data. not for future coming data
            // $('.deletecategory').click(function(e) {

            //this work current dom and new ADDED dom element
            $(document).on('click','.deletecategory',function(e){
                //to prevent the default behavior of a specified event from occurring
                e.preventDefault();
                var categoryId = $(this).val()
                $('#categoryid').val(categoryId);
                $('#deleteModel').modal('show');
            })
        })
    </script>
@endsection
