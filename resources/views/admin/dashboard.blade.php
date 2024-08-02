@extends('layouts.master')
@section('title' . 'Blog Dashboard')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body d-flex align-items-center">
                        <i class="fas fa-list-alt fa-3x me-3"></i>
                        <div>
                            <div class="mb-2">Total Categories</div>
                            <h2>{{ $totalCategory }}</h2>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{ url('admin/category') }}">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body d-flex align-items-center">
                        <i class="fas fa-pencil-alt fa-3x me-3"></i>
                        <div>
                            <div class="mb-2">Total Posts</div>
                            <h2>{{ $totalPost }}</h2>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{ url('admin/view_post') }}">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body d-flex align-items-center">
                        <i class="fas fa-users fa-3x me-3"></i>
                        <div>
                            <div class="mb-2">Total Users</div>
                            <h2>{{ $totalUser }}</h2>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{ url('admin/view_user') }}">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-body d-flex align-items-center">
                        <i class="fas fa-user-shield fa-3x me-3"></i>
                        <div>
                            <div class="mb-2">Total Admin</div>
                            <h2>{{ $totalAdmin }}</h2>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{ url('admin/category') }}">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mt-5">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="mb-0">Record</h2>
            </div>
            <table class="table table-striped table-bordered" id="mydataTable">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Category Name</th>
                        <th>Post Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($postdata as $categories)
                        <tr>
                            <td>{{ $categories->id }}</td>
                            <td>{{ $categories->name }}</td>
                            <td>{{ $categories->category->name }}</td>
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
