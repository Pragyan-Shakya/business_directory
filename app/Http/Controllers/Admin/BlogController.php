<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Blog;
use App\Repositories\Repository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class BlogController extends Controller
{
    protected $model;

    public function __construct(Blog $blog)
    {
        $this->middleware('permission:testimonial-list|blog-create|blog-edit|blog-delete', ['only' => ['index','store']]);
        $this->middleware('permission:blog-create', ['only' => ['create','store']]);
        $this->middleware('permission:blog-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:blog-delete', ['only' => ['destroy']]);

        $this->model = new Repository($blog);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = $this->model->all();
        return view('admin.blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');
        if($files = $request->file('image')) {
//            if($user->avatar && is_file($user->avatar)){
//                unlink($user->avatar);
//            }
            // for save original image
            $ImageUpload = Image::make($files)->resize(800, 600);
            $originalPath = 'public/assets/uploads/blogs/'.time().$files->getClientOriginalName();
            $ImageUpload->save($originalPath);
            $data['image'] = $originalPath;
        }
        if($files = $request->file('author_image')) {
//            if($user->avatar && is_file($user->avatar)){
//                unlink($user->avatar);
//            }
            // for save original image
            $ImageUpload = Image::make($files)->resize(200, 200);
            $originalPath = 'public/assets/uploads/blogs/'.time().$files->getClientOriginalName();
            $ImageUpload->save($originalPath);
            $data['author_image'] = $originalPath;
        }
        $data['slug'] = Str::slug($data['title']);
        $data['user_id'] = Auth::user()->id;
        $this->model->create($data);
        return redirect()->route('admin.blog.index')->with('success', 'Blog Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = $this->model->show($id);
        return view('admin.blog.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $blog = $this->model->show($id);
        $data = $request->except(['_token', '_method']);
        if($files = $request->file('image')) {
            if($blog->image && is_file($blog->image)){
                unlink($blog->image);
            }
            // for save original image
            $ImageUpload = Image::make($files)->resize(800, 600);
            $originalPath = 'public/assets/uploads/blogs/'.time().$files->getClientOriginalName();
            $ImageUpload->save($originalPath);
            $data['image'] = $originalPath;
        }
        if($files = $request->file('author_image')) {
            if($blog->author_image && is_file($blog->author_image)){
                unlink($blog->author_image);
            }
            // for save original image
            $ImageUpload = Image::make($files)->resize(200, 200);
            $originalPath = 'public/assets/uploads/blogs/'.time().$files->getClientOriginalName();
            $ImageUpload->save($originalPath);
            $data['author_image'] = $originalPath;
        }
        $data['slug'] = Str::slug($data['title']);
        $data['user_id'] = Auth::user()->id;
        $this->model->update($data, $id);
        return redirect()->route('admin.blog.index')->with('success', 'Blog Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->model->delete($id);
        return redirect()->route('admin.blog.index')->with('success', 'Blog Deleted Successfully!');
    }
}
