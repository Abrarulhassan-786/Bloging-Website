@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <div class="row">
        <!-- Post Column -->
        <div class="col-md-8">
            <div class="post-container mx-5">
                <!-- Post Header -->
                <div class="d-flex align-items-center mb-4 p-3 border rounded shadow-sm">
                    {{-- <img src="profile-pic.jpg" alt="Profile Picture" class="rounded-circle mr-3" width="50" height="50"> --}}
                    <div>
                        <h4 class="mb-1">{{$post->name}}</h4>
                        <p class="text-muted mb-0">{{$post->category->name . '/' . $post->name }}</p>
                    </div>
                </div>                
                <!-- Post Content -->
                <div class="mb-4">
                    <p>{!! $post->description !!}</p>
                    <img src="post-image.jpg" alt="Post Image" class="img-fluid">
                </div>
            </div>
        </div>
        <!-- Advertising Column -->
        <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Advertising</h5>
                    <!-- Add your advertisement content here -->
                    <p class="card-text">Your advertisement content goes here.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
