<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceRequest;
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
        $company = Company::where('user_id', auth()->user()->id)->first();
        $services = $company->services;
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
    public function store(ServiceRequest $request)
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
    public function update(ServiceRequest $request, $id)
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

    public function sortOrder(Request $request)
    {
        $company = Company::where('user_id', auth()->user()->id)->first();
        $services = Service::where('company_id', $company->id)->get();

        foreach ($services as $task) {
            $task->timestamps = false; // To disable update_at field updation
            $id = $task->id;

            foreach ($request->order as $order) {
                if ($order['id'] == $id) {
                    $task->update(['order' => $order['position']]);
                }
            }
        }

        return response('Update Successfully.', 200);
    }
}
