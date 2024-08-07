<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Model\District;
use App\Model\Industry;
use App\Model\Province;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
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
        $industries = Industry::where('status', 'Active')->get();
        $provinces = Province::all();
        $destinations = District::leftJoin('companies', 'districts.id', 'companies.district_id')->
            selectRaw('districts.*, count(companies.district_id) AS `count`')->
            groupBy('districts.id', 'districts.province_id', 'districts.district_name', 'districts.image', 'districts.created_at', 'districts.updated_at')->
            orderBy('count', 'DESC')->
            paginate(24);

        return view('front.listing.destination', compact('destinations', 'industries', 'provinces', 'top_destinations'));
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
        $top_destinations = District::with('companies')->get()->sortByDesc(function($q){
            return $q->companies()->count();
        })->take(8);
        $industries = Industry::where('status', 'Active')->get();
        $provinces = Province::all();
        $district = District::find($id);
        $title = $district->district_name;
        $listings = $district->companies()->paginate(12);
        return view('front.listing.listings', compact('listings', 'industries', 'provinces', 'title', 'top_destinations'));
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
        //
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
