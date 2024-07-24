@extends('layouts.master')
@section('title' . 'Edit User')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container mt-5">
        <div class="border p-4 rounded">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="mb-0">Update User</h2>
                <a href="{{ route('admin.view_user') }}" class="btn btn-danger">Back</a>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="fullname">Full Name</label>
                    <p class="form-control">{{$user->name}}</p>
                </div>
                <div class="mb-3">
                    <label for="Email">Email</label>
                    <p class="form-control">{{$user->email}}</p>
                </div>
                <div class="mb-3">
                    <label for="Email">Created_At</label>
                    <p class="form-control">{{$user->created_at}}</p>
                </div>
            </div>
            <form action="{{ route('admin.update_user', ['user_id' => $user->id]) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="roleas">Role As</label>
                    <select name="role_as" id="" class="form-control">
                        <option value="">---Select Role---</option>
                        <option value="1" {{$user->role_as == '1'? 'selected':''}}>Admin</option>
                        <option value="0" {{$user->role_as == '0'? 'selected':''}}>User</option>
                        <option value="2" {{$user->role_as == '2'? 'selected':''}}>Blogger</option>
                    </select>
                </div>
                <div class="col-md-3 mb-3 ">
                    <button type="submit" class="btn bg-success text-white">Update User</button>
                </div>
            </form>
        </div>
    </div>
@endsection
