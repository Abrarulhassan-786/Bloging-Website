@extends('layouts.app')
@section('content')
@section('title', 'Post Title')
@section('meta_description', 'Post Meta Description')
@section('meta_keyword', 'Post Meta Keyword')
<div class="container mt-5">
    <div class="row">
        <!-- Post Column -->
        <div class="col-md-8">
            <div class="post-container mx-5">
                <!-- Post Content -->
                <div class="mb-4 post-description bg-white px-3 py-3">
                    <!-- Post Header -->
                    <div class="d-flex align-items-center mb-4 p-3 border rounded shadow-sm bg-white">
                        {{-- <img src="profile-pic.jpg" alt="Profile Picture" class="rounded-circle mr-3" width="50" height="50"> --}}
                        <div>
                            <h4 class="mb-1">{{ $post->name }}</h4>
                            <p class="text-muted mb-0">{{ $post->category->name . '/' . $post->name }}</p>
                        </div>
                    </div>
                    <img src="{{ asset('upload/category/' . $post->category->image) }}" alt="Post Image" class="img-fluid">
                    <p>{!! $post->description !!}</p>
                </div>
            </div>
        </div>
        <!-- Advertising Column -->
        <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Advertising</h5>
                    <p class="card-text">Your advertisement content goes here.</p>
                </div>
            </div>
            <!-- Latest Posts Section -->
            <div class="card mb-4 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Latest Posts</h5>
                    <ul class="list-unstyled">
                        @foreach ($post_latest as $latestpost)
                            <!-- Dummy Post 1 -->
                            <li class="media mb-3">
                                {{-- <img src="thumbnail1.jpg" alt="Post Thumbnail 1" class="mr-3" width="60"> --}}
                                <div class="media-body">
                                    <a class="mt-0 mb-1" href="{{ url('tutorial/' . $category->slug . '/' . $latestpost->slug) }}" style="text-decoration: none; font-weight: bold;">
                                        {{ $latestpost->name }}
                                    </a>
                                    <img src="{{asset('upload/category/' . $latestpost->category->image)}}" alt="Description of image" class="img-fluid" style="max-width: 100%; height: auto;">
                                    <p class="text-muted">{{ $latestpost->created_at->format('Y-m-d') }}</p>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
