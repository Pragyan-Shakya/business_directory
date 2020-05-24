<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Mail\ContactCompanyMail;
use App\Model\Company;
use App\Model\ContactCompany;
use App\Jobs\ContactCompany as SendCompanyContactMail;
use App\Model\District;
use App\Model\Gallery;
use App\Model\Industry;
use App\Model\Province;
use App\Model\SaveListing;
use App\Repositories\Repository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CompanyController extends Controller
{
    protected $model;

    public function __construct(Company $company)
    {
        $this->model = new Repository($company);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $top_destinations = District::with('companies')->get()->sortByDesc(function($q){
            return $q->companies()->count();
        })->take(8);
        $listings = Company::where('status', 'Active')->paginate(9);
        $industries = Industry::where('status', 'Active')->get();
        $provinces = Province::all();
        return view('front.listing.listings', compact('listings', 'industries', 'provinces', 'top_destinations'));
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $listing = Company::where('slug', $slug)->first();
        $relatedListings = Company::where('industry_id', $listing->industry_id)->where('status', 'Active')->whereNotIn('id',[$listing->id])->take(3)->get();
        return view('front.listing.single', compact('listing', 'relatedListings'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function industryListing($slug)
    {
        $industry = Industry::where('slug', $slug)->first();
        $listings = Company::where('industry_id', $industry->id)->where('status', 'Active')->paginate(9);
        return view('front.listing.listings', compact('listings'));
    }

    public function saveListing($id){
        if(SaveListing::create([
            'user_id' => auth()->user()->id,
            'company_id' => $id,
        ])){
            return response()->json(['message'=>'success'], 200);
        }
    }

    public function addContactMessage(Request $request ,$id){
        $company = $this->model->show($id);
        $data = $request->except('_token');
        $data['company_id'] = $id;
        if(ContactCompany::create($data)){
            SendCompanyContactMail::dispatch($id, $data)->delay(Carbon::now()->addMinutes(1));
//            Mail::to($company->email)->send(new ContactCompanyMail($data));
            return redirect()->back()->with('success', 'Your message is delivered!!!');
        }
    }

}
