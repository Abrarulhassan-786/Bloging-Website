@extends('layouts.master')

@section('title', 'View User Record')

@section('content')
<div class="container-fluid px-4">
    @if(session('messageCategory'))
        <div class="alert alert-success">{{ session('messageCategory') }}</div>
    @endif
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">View User</h2>
        </div>
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>User Name</th>
                    <th>Email </th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->role_as == 1?'Admin':($item->role_as == 0?'User':'Blogger')}}</td>
                    <td>
                        <a href="{{route('admin.edit_user',['user_id'=>$item->id])}}" class="btn btn-success btn-sm">Edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
