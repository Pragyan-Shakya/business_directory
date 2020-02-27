<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\JobRequest;
use App\Model\Company;
use App\Model\Industry;
use App\Model\Job;
use App\Repositories\Repository;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class JobController extends Controller
{
    protected $model;

    public function __construct(Job $job)
    {
        $this->model = new Repository($job);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company = Company::where('user_id', auth()->user()->id)->first();
        $jobs = $company->jobs;
        return view('user.job.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $industries = Industry::where('status', 'Active')->get();
        return view('user.job.create', compact('industries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JobRequest $request)
    {
        $data = $request->except('_token');
        $company = Company::where('user_id', auth()->user()->id)->first();
        $data['slug'] = Str::slug($data['title']);
        $data['company_id'] = $company->id;
        if($this->model->create($data)){
            return redirect()->route('user.job.index')->with('success', 'New Job Added!!!');
        }
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
        $industries = Industry::where('status', 'Active')->get();
        $job = $this->model->show($id);
        return view('user.job.edit', compact('industries', 'job'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(JobRequest $request, $id)
    {
        $data = $request->except(['_token', '_method']);
        $data['slug'] = Str::slug($data['title']);
        if($this->model->update($data, $id)){
            return redirect()->route('user.job.index')->with('success', 'Job Updated!!!');
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
        if($this->model->delete($id)){
            return redirect()->back()->with('success', 'Job Deleted!!!');
        }

    }
}
