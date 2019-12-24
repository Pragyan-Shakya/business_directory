<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Industry;
use App\Repositories\Repository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class IndustryController extends Controller
{
    protected $model;

    function __construct(Industry $industry)
    {
        $this->middleware('permission:industry-list|industry-create|industry-edit|industry-delete', ['only' => ['index','store']]);
        $this->middleware('permission:industry-create', ['only' => ['create','store']]);
        $this->middleware('permission:industry-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:industry-delete', ['only' => ['destroy']]);

        $this->model = new Repository($industry);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $industries = $this->model->all();
        return view('admin.industry.index', compact('industries'));
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
        $this->validate($request, [
            'title' => 'required',
            'status' => 'required',
        ]);
        $data = $request->except('_token');
        $data['slug'] = Str::slug($request->title);
        $this->model->create($data);
        return redirect()->back()->with('success', 'New Industry Added!!!');

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
        $industry = $this->model->show($id);
        return view('admin.industry.edit', compact('industry'));
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
        $this->validate($request, [
            'title' => 'required',
            'status' => 'required',
        ]);
        $data = $request->except(['_token', '_method']);
        $data['slug'] = Str::slug($request->title);
        $this->model->update($data, $id);
        return redirect()->route('admin.industry.index')->with('success', 'Industry Edited!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->model->delete($id);
        return redirect()->back()->with('success', 'Industry Deleted!!!');

    }
}
