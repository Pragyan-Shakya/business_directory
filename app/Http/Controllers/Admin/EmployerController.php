<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Employer;
use App\Repositories\Repository;
use App\User;
use Illuminate\Http\Request;

class EmployerController extends Controller
{
    protected $model;

    function __construct(Employer $employer)
    {
        $this->middleware('permission:employer-list|employer-create|employer-edit|employer-delete', ['only' => ['index','store']]);
        $this->middleware('permission:employer-create', ['only' => ['create','store']]);
        $this->middleware('permission:employer-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:employer-delete', ['only' => ['destroy']]);

        $this->model = new Repository($employer);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employers  = User::whereHas('employer', function ($q){
        })->get();
        return view('admin.user.employer', compact('employers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = array(
            'user_id' => $request->id,
            'status' => 'Active',
        );
        $this->model->create($data);
        return redirect()->back()->with('success', 'New Employer Added');
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
        //
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
    }
}
