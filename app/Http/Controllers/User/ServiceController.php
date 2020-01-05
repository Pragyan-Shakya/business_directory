<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Model\Company;
use App\Model\Service;
use App\Repositories\Repository;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    protected $model;

    public function __construct(Service $service)
    {
        $this->model = new Repository($service);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $services = $this->model->all();
        return view('user.service.index', compact('services'));
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
//        dd($request->all());
        $data = $request->except('_token');
        $company = Company::where('user_id', auth()->user()->id)->first();
        $data['company_id'] = $company->id;
        $service = Service::insert($data);
        if($service){
            return redirect()->route('user.service.index')->with('success', 'Service Added!!!');
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
        $service = $this->model->show($id);
        return view('user.service.edit', compact('service'));
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
        $data = $request->except(['_token', 'method']);
        $service = $this->model->show($id);
        $service = $service->update($data);
        if($service){
            return redirect()->route('user.service.index')->with('success', 'Service Updated!!!');
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
        $this->model->delete($id);
        return redirect()->back()->with('success', 'Service Deleted!!!');
    }
}
