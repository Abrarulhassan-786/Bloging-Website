@extends('layouts.master')

@section('title', 'Blog Dashboard')

@section('content')
    <div class="container-fluid px-4">
        @if (session('messagepost'))
            <div class="alert alert-success">{{ session('messagepost') }}</div>
        @endif
        <div class="container mt-5">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="mb-0">View Post</h2>
                <a href="{{ route('admin.add_post') }}" class="btn btn-primary">Add Post</a>
            </div>
            <table class="table table-striped table-bordered" id="mydataTable">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Category</th>
                        <th>Post Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($post as $itemdata)
                        <tr>
                            <td>{{ $itemdata->id }}</td>
                            <td>{{ $itemdata->category->name}}</td>
                            <td>{{ $itemdata->name }}</td>
                            <td>{{ $itemdata->status == '1'?'Hidden':'Visible'}}</td>
                            <td>
                                <a href="{{Route('admin.edit_post',['id'=>$itemdata->id])}}"
                                    class="btn btn-success btn-sm">Edit</a>
                                <a href="{{Route('delete_postrecord',['id'=>$itemdata->id])}}"
                                    class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
