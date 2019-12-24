<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Testimonial;
use App\Repositories\Repository;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class TestimonialController extends Controller
{
    protected $model;

    public function __construct(Testimonial $testimonial)
    {
        $this->middleware('permission:testimonial-list|testimonial-create|testimonial-edit|testimonial-delete', ['only' => ['index','store']]);
        $this->middleware('permission:testimonial-create', ['only' => ['create','store']]);
        $this->middleware('permission:testimonial-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:testimonial-delete', ['only' => ['destroy']]);

        $this->model = new Repository($testimonial);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials = $this->model->all();
        return view('admin.testimonial.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'avatar' => 'image|mimes:jpg,jpeg,png',
            'message' => 'required',
            'designation' => 'nullable',
        ]);
        $data = $request->except('_token');
        if($files = $request->file('avatar')) {
//            if($user->avatar && is_file($user->avatar)){
//                unlink($user->avatar);
//            }
            // for save original image
            $ImageUpload = Image::make($files)->resize(200, 200);
            $originalPath = 'public/assets/uploads/testimonials/'.time().$files->getClientOriginalName();
            $ImageUpload->save($originalPath);
            $data['avatar'] = $originalPath;
        }
        $this->model->create($data);
        return redirect()->back()->with('success', 'New testimonial added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function show(Testimonial $testimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $testimonial = $this->model->show($id);
        return view('admin.testimonial.edit', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $testimonial = $this->model->show($id);
        $this->validate($request, [
            'name' => 'required',
            'avatar' => 'image|mimes:jpg,jpeg,png',
            'message' => 'required',
            'designation' => 'nullable',
        ]);
        $data = $request->except(['_token', '_method']);
        if($files = $request->file('avatar')) {
            if($testimonial->avatar && is_file($testimonial->avatar)){
                unlink($testimonial->avatar);
            }
            // for save original image
            $ImageUpload = Image::make($files)->resize(200, 200);
            $originalPath = 'public/assets/uploads/testimonials/'.time().$files->getClientOriginalName();
            $ImageUpload->save($originalPath);
            $data['avatar'] = $originalPath;
        }
        $this->model->update($data, $id);
        return redirect()->route('admin.testimonial.index')->with('success', 'Testimonial updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->model->delete($id);
        return redirect()->back()->with('success', 'Testimonial Deleted Successfully!');
    }
}
