<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\PostFromRequest; 
use Illuminate\Validation\Validator;

class PostController extends Controller
{
    public function index()
    {
        $post = Post::all();
        return view('admin.post.index',compact('post'));
    }
    public function create()
    {
        $categry = Category::where('status','0')->get();
        return view('admin.post.create',compact('categry'));
    }
    public function store(PostFromRequest $request)
    {
        $postdata = $request->validated();
        $post = new Post;
        $post->category_id = $postdata['category_id'];
        $post->name = $postdata['name'];
        $post->slug = $postdata['slug'];
        $post->description = $postdata['description'];
        $post->yt_frame = $postdata['yt_frame'];
        $post->meta_title = $postdata['meta_title'];
        $post->meta_description = $postdata['meta_description'];
        $post->meta_keyword = $postdata['meta_keyword'];
        $post->status = $postdata['status'];
        $post->created_by = Auth::user()->id;
        $post->save();
        return redirect('admin/view_post')->with('messagepost','Post Created Successfully');
    }
    public function edit($id)
    {
        $category = Category::where('status',0)->get();
        $post = Post::find($id);
        return view("admin.post.edit",compact('post','category'));
    }
    public function update(PostFromRequest $request,$id)
    {
       
        $postdata = $request->validated();
        $post = Post::find($id);
        $post->category_id = $postdata['category_id'];
        $post->name = $postdata['name'];
        $post->slug = $postdata['slug'];
        $post->description = $postdata['description'];
        $post->yt_frame = $postdata['yt_frame'];
        $post->meta_title = $postdata['meta_title'];
        $post->meta_description = $postdata['meta_description'];
        $post->meta_keyword = $postdata['meta_keyword'];
        $post->status = $postdata['status'];
        $post->created_by = Auth::user()->id;
        $post->update();
        return redirect('admin/view_post')->with('messagepost','Post updated Successfully');
    }
    public function destroy($id)
    {
        $post = Post::find($id);
        if($post)
        {
            $post->delete();
            return redirect('admin/view_post')->with('messagepost','Record Post Deleted Successfully');
        }
        else
        {
            return redirect('admin/view_post')->with('messagepost','You could not download it, Not available');

        }
        
    }
}
