@extends('layouts.app')
@section('title', $category->meta_title)
@section('meta_description', $category->meta_description)
@section('meta_keyword', $category->meta_keyword)
@section('content')
    <div class="container mt-5">
        <div class="row">
            <!-- Heading for the Posts Section -->
            <div class="col-12 mb-4">
                <h1>{{ $category->name }}</h1>
            </div>
        </div>
        <div class="row">
            <!-- Post Column -->
            <div class="col-md-8">
                @forelse ($post as $item)
                <div class="card mb-4 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->name }}</h5>
                        <img src="{{ asset('upload/category/' . $item->category->image) }}" class="card-img mb-3" alt="{{ $item->name }}">
                        <h6>Posted On: {{ $item->created_at->format('y-m-d') }}</h6>
                        <h6>Posted by: {{ $item->user->name }}</h6>
                        <a href="{{ url('tutorial/' . $category->slug . '/' . $item->slug) }}" class="btn btn-primary">Read More</a>
                    </div>
                </div>           
                @empty
                    <div class="card mb-4 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">No Available Posts</h5>
                        </div>
                    </div>
                @endforelse
                <div class="your-paginator">
                    {{ $post->links() }}
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
