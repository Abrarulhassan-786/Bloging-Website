@extends('layouts.master')

@section('title', 'View Category')

@section('content')
<div class="container-fluid px-4">
    @if(session('messageCategory'))
        <div class="alert alert-success">{{ session('messageCategory') }}</div>
    @endif
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">View Category</h2>
            <a href="{{route('admin.add_category')}}" class="btn btn-primary">Add Category</a>
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
                        <img src="{{ asset('upload/category/' . $categories->image) }}" width="50px" height="50px" alt="image">
                    </td>
                    <td>{{ $categories->status }}</td>
                    <td>
                        <a href="{{route('admin.edit_category', ['id' => $categories->id]) }}" class="btn btn-success btn-sm">Edit</a>
                        <a href="{{route('admin.delete_category',['id'=>$categories->id])}}" class="btn btn-success btn-sm">Delete</a> 
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
