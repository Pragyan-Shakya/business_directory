<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyRegisterRequest;
use App\Http\Traits\CompanyTrait;
use App\Model\Company;
use App\Model\Employer;
use App\Model\Industry;
use App\Model\Province;
use App\Repositories\Repository;
use App\User;
use function foo\func;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class CompanyController extends Controller
{
    use CompanyTrait;

    // space that we can use the repository from
    protected $model;

    function __construct(Company $company)
    {
        $this->middleware('permission:company-list|company-create|company-edit|company-delete', ['only' => ['index','store']]);
        $this->middleware('permission:company-create', ['only' => ['create','store']]);
        $this->middleware('permission:company-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:company-delete', ['only' => ['destroy']]);

        $this->model = new Repository($company);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->hasRole('Moderator')){
            $companies = Company::where('moderator_id',auth()->user()->id)->get();
        }
        else{
            $companies = $this->model->all();
        }
        return view('admin.company.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $industries = Industry::where('status', 'Active')->get();
        $provinces = Province::all();
        $users = User::whereDoesntHave('company')->whereHas('roles', function ($q){
            $q->where('name', 'User');
        })->get();
        $employers = Employer::all();
        return view('admin.company.create', compact('industries', 'employers', 'users', 'provinces'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


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
        $company = $this->model->show($id);
        $provinces = Province::all();

        $industries = Industry::where('status', 'Active')->get();
        $users = User::whereDoesntHave('company')->whereHas('roles', function ($q){
            $q->where('name', 'User');
        })->get();
        $employers = Employer::all();
        return view('admin.company.edit', compact('company', 'industries', 'employers', 'users', 'provinces'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = $this->model->show($id);
        if($company->logo && is_file($company->logo)){
            unlink($company->logo);
        }
        if($company->cover_image && is_file($company->cover_image)){
            unlink($company->cover_image);
        }
        $this->model->delete($id);
        return redirect()->back()->with('success', 'Company Deleted!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

}
