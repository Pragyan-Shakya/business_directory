<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\District;
use App\Model\Province;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class DestinationController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:destination-list|destination-create|destination-edit|destination-delete', ['only' => ['index','store']]);
        $this->middleware('permission:destination-edit', ['only' => ['edit','update']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $destinations = District::all();
        return view('admin.destination.index', compact('destinations'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $destination = District::find($id);
        $provinces = Province::all();

        return view('admin.destination.edit', compact('destination', 'provinces'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $destination = District::find($id);
        $data = $request->except(['_token', '_method']);
        if($files = $request->file('image')) {
            if($destination->image && is_file($destination->image)){
                unlink($destination->image);
            }
            $ImageUpload = Image::make($files);
            $originalPath = 'public/assets/uploads/destinations/'.time().$files->getClientOriginalName();
            $ImageUpload->save($originalPath, 80);
            $data['image'] = $originalPath;
        }
        $destination->province_id = $data['province_id'];
        if($destination->update($data)){
            return redirect()->route('admin.destination.index')->with('success', 'Destination Info Updated!!!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
