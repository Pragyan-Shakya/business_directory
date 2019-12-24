<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyRegisterRequest;
use App\Http\Traits\CompanyTrait;
use App\Model\Company;
use App\Model\Employer;
use App\Model\Industry;
use App\Repositories\Repository;
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
        $companies = $this->model->all();
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
        $employers = Employer::all();
        return view('admin.company.create', compact('industries', 'employers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRegisterRequest $request)
    {
        $data = $request->all();
        unset($data['_token']);
        $employer = Employer::find($request->employers_id);
        if($files = $request->file('logo')) {
//            if($user->avatar && is_file($user->avatar)){
//                unlink($user->avatar);
//            }
            // for save original image
            $ImageUpload = Image::make($files)->resize(200, 200);
            $originalPath = 'public/assets/uploads/logos/'.time().$files->getClientOriginalName();
            $ImageUpload->save($originalPath);
            $data['logo'] = $originalPath;
        }
        if($files = $request->file('cover_image')) {
//            if($user->avatar && is_file($user->avatar)){
//                unlink($user->avatar);
//            }
            // for save original image
            $ImageUpload = Image::make($files);
            $originalPath = 'public/assets/uploads/cover_images/'.time().$files->getClientOriginalName();
            $ImageUpload->save($originalPath);
            $data['cover_image'] = $originalPath;
        }
        $data['user_id'] = $employer->user_id;
        $data['slug'] = Str::slug($request->title);
        $data['seo'] = $request->title;

        $company = $this->model->create($data);
        return redirect()->route('admin.company.index')->with('success', 'New Company added');
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
        $company = $this->model->show($id);
        $industries = Industry::where('status', 'Active')->get();
        $employers = Employer::all();
        return view('admin.company.edit', compact('company', 'industries', 'employers'));
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
        //
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
