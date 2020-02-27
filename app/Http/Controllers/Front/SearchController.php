<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Model\Company;
use App\Model\District;
use App\Model\Industry;
use App\Model\Province;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function listing_search(Request $request){
        $keyword = $request->keyword;
        $search_industry = $request->industry;
        $search_province = $request->province_id;
        $search_location = $request->location;
        $search_municipal = $request->municipal_id;
        $search_rating = $request->rating;

        $listings = Company::where('status', 'Active');
        if($keyword != null){
            $listings = $listings->where('title', 'LIKE', '%'.$keyword.'%');
        }
        if($search_industry != null){
            $listings = $listings->whereHas('industry', function ($q) use ($search_industry){
                $q->where('slug', $search_industry);
            });
        }
        if($search_province != null){
            $listings = $listings->where('province_id', $search_province);
        }
        if($search_location != null){
            $listings = $listings->where('district_id', $search_location);
        }
        if($search_municipal != null){
            $listings = $listings->where('municipal_id', $search_municipal);
        }
        if(isset($search_rating) || $search_rating != null){
            $listings = $listings->whereHas('reviews', function ($q) use ($search_rating){
               $q->havingRaw('AVG(reviews.rating) >= ?', [$search_rating]);
            });
        }
        $listings = $listings->paginate(12);
        $industries = Industry::where('status', 'Active')->get();
        $provinces = Province::all();
        return view('front.listing.search', compact('listings', 'keyword', 'search_industry', 'search_location', 'industries', 'provinces'));
    }
}
