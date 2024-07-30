<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\Admin\CategoryFormRequest; 
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Validator;
use App\Http\Controllers\Admin\Log;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::all();
        return view('admin.category.index',compact('category'));
    }
    public function create()
    {
        return view('admin.category.create');
    }
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|string|max:200',
            'slug' => 'required|string|max:200',
            'description' => 'required|string',
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'meta_title' => 'required|string|max:200',
            'meta_description' => 'required|string',
            'meta_keyword' => 'required|string',
            'navbar_status' => 'nullable|boolean',
            'status' => 'nullable|boolean'
        ]);
        //getting value from checboxs navbar status and status
        $navbarstatus = $request->input('navbar_status');
        $status = $request->input('status');

        $category = new Category();
    $category->name = $request->name;
    $category->slug = Str::slug($request->slug);
    $category->description = $request->description;
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $filename = time().''.$file->getClientOriginalExtension();
            $file->move('upload/category/',$filename);
            $category->image = $filename;
        }
        $category->meta_title = $request->meta_title;
        $category->meta_description = $request->meta_description;
        $category->meta_keyword = $request->meta_keyword;
        $category->navbar_status = $navbarstatus;
        $category->status = $status;
        $category->created_by = Auth::user()->id;
        $category->save();
        return redirect('admin/category')->with('messageCategory','Category Added Successfully');
    }
    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit',compact('category'));
    }
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:200',
            'slug' => 'required|string|max:200',
            'description' => 'required|string',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'meta_title' => 'required|string|max:200',
            'meta_description' => 'required|string',
            'meta_keyword' => 'required|string',
            'navbar_status' => 'nullable|boolean',
            'status' => 'nullable|boolean'
        ]);
        //getting value from checboxs navbar status and status
        $navbarstatus = $request->input('navbar_status');
        $status = $request->input('status');

        $category = Category::find($id);
    $category->name = $request->name;
    $category->slug = Str::slug($request->slug);
    $category->description = $request->description;
        if($request->hasfile('image'))
        {
            $destination = 'upload/category/'.$category->image;
            if(File::exits($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('image');
            $filename = time().''.$file->getClientOriginalExtension();
            $file->move('upload/category/',$filename);
            $category->image = $filename;
        }
        $category->meta_title = $request->meta_title;
        $category->meta_description = $request->meta_description;
        $category->meta_keyword = $request->meta_keyword;
        $category->navbar_status = $navbarstatus;
        $category->status = $status;
        $category->created_by = Auth::user()->id;
        $category->update();
        return redirect('admin/category')->with('messageCategory','Category Updated Successfully');
    }
    public function destroy(Request $request)
    {
        $category = Category::find($request->category_delete_id);
        if($category)
        {
            $destination = 'upload/category/'.$category->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $category->delete();
            $category->posts()->delete();
            return redirect('admin/category')->with('messageCategory','Delete Record with post Sucessfully');
        }
        else
        {
            return redirect('admin/category')->with('messageCategory','You could not download it, Not available');
        }
    }
}
