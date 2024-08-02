<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $latest_post = Post::where('status','0')->orderBy('created_at','DESC')->get()->take(6);
        $category = Category::where('status','0')->get();
        foreach($latest_post as $descript)
        {
            $descript->description = str::limit($descript->description,100); //limit to 100 character
        }
        return view('frontend.index',compact('category','latest_post'));
    }
    public function viewcategorypost(string $category_slug)
    {
        $category = Category::where('slug',$category_slug)->where('status',0)->first();
        if($category)
        {
            $post = Post::where('category_id',$category->id)->where('status',0)->paginate(2);
            return view('frontend.post.index',compact('category','post'));
        }
        else
        {
            return view('/');
        }
    }
    public function viewpost(string $category_slug, string $post_slug)
    {
        $category = Category::where('slug',$category_slug)->where('status',0)->first();
        if($category)
        {
            $post = Post::where('category_id',$category->id)->where('slug', $post_slug)->where('status',0)->first();
            $post_latest = Post::where('category_id',$category->id)->where('status',0)->orderBy('created_at','DESC')->get()->take(10);

            return view('frontend.post.view',compact('post','post_latest','category'));
        }
        else
        {
            return view('/');
        }
    }
}
