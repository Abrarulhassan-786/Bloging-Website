@extends('layouts.master')
@section('title' . 'Add Post')
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
            <div class="bg-light p-3 mb-4">
                <h2 class="mb-0">Add Post</h2>
            </div>
            <form action="{{ route('admin.add_post') }}" method="POST">
                @csrf
                <div class="form-group col-12 mb-3">
                    <label for="selectCategory">Select Category</label>
                    <select class="form-control" id="category_id" name="category_id">
                        @foreach ($categry as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-12 mb-3">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Name">
                </div>
                <div class="form-group col-12 mb-3">
                    <label for="slug">slug</label>
                    <input type="text" class="form-control" name="slug" placeholder="Slug">
                </div>
                <div class="form-group mb-3">
                    <label for="description">Description</label>
                    <textarea class="form-control" name="description" rows="5" placeholder="Description"></textarea>
                </div>
                <div class="form-group col-12 mb-3">
                    <label for="yt_frame">YT_Frame</label>
                    <input type="text" class="form-control" name="yt_frame" placeholder="YT_Frame">
                </div>
                <h6>SEO tags</h6>
                <div class="form-group mb-3">
                    <label for="metatitle">Meta Title</label>
                    <input type="text" class="form-control" name="meta_title" placeholder="Meta Title">
                </div>
                <div class="form-row">
                    <div class="form-group col-12 mb-3">
                        <label for="metadescription">Meta Description</label>
                        <textarea class="form-control" rows="3" name="meta_description" id="metadescription"></textarea>
                    </div>
                    <div class="form-group col-12 mb-3">
                        <label for="metakeyword">Meta Keywords</label>
                        <textarea class="form-control" name="meta_keyword" id="metakeyword"></textarea>

                    </div>
                </div>
                <h6>Status Mode</h6>
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <div class="form-check">
                            <input type="hidden" name="status" value="0">
                            <input type="checkbox" class="form-check-input" id="status" name="status" value="1">
                            <label class="form-check-label" for="status">Status</label>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3 ">
                        <button type="submit" class="btn bg-success text-white">Save Post</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
