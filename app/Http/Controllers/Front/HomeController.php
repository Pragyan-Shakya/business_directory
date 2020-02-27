<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Model\Blog;
use App\Model\Company;
use App\Model\District;
use App\Model\Industry;
use App\Model\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $industries = Industry::where('status', 'Active')->get();
        $districts = District::all();
        $listings = Company::where('status', 'Active')->orderBy('id', 'DESC')->take(5)->get();
        $blogs = Blog::where('status', 'Active')->orderBy('id', 'DESC')->take(5)->get();
        $testimonials = Testimonial::where('status', 'Active')->orderBy('id', 'DESC')->take(5)->get();

        return view('front.index', compact('blogs', 'testimonials', 'listings', 'industries', 'districts'));
    }
}
