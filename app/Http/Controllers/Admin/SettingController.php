<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Configuration;
use App\Model\Industry;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:change-settings');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $industries = Industry::where('status', 'Active')->get();
        return view('admin.settings.index', compact('industries'));
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
        $inputs = $request->only(
            'company_name',
            'site_title',
            'site_description',
            'site_primary_email',
            'site_secondary_email',
            'site_primary_phone',
            'site_secondary_phone',
            'site_address',
            'order_email',
            'site_logo',
            'site_favicon',
            'facebook_link',
            'twitter_link',
            'googleplus_link',
            'instagram_link',
            'linkedin_link',
            'who_we_are',
            'our_mission',
            'our_vision',
            'our_help',
            'our_support',
            'footer_logo',
            'payments_logo',
            'copyright',
            'keywords',
            'description',
            'login-img',
            'google_map',
            'listing_categories',
            'front_banner'
        );

        foreach ($inputs as $inputKey => $inputValue) {
            if (
                $inputKey == 'site_logo' ||
                $inputKey == 'site_favicon' ||
                $inputKey == 'footer_logo' ||
                $inputKey == 'payments_logo' ||
                $inputKey == 'front_banner' ||
                $inputKey == 'login-img') {
                $file = $inputValue;
                // Delete old file
                $this->deleteFile($inputKey);
                // Upload file & get store file name
                $fileName = $this->uploadFile($file);
                $inputValue = $fileName;
            }
            if( $inputKey == 'listing_categories'){
                $inputValue = json_encode($inputValue);
            }

            Configuration::updateOrCreate(['configuration_key' => $inputKey], ['configuration_value' => $inputValue]);
        }

        return redirect()->back()->with('success', 'Settings successfully updated!!');
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

    protected function uploadFile($file)
    {
        // Store file
        $ImageUpload = Image::make($file);
        $originalPath = 'public/assets/uploads/settings/'.time().$file->getClientOriginalName();
        $ImageUpload->save($originalPath);
        // File name
        return $originalPath;
    }

    protected function deleteFile($inputKey)
    {
        $configuration = Configuration::where('configuration_key', '=', $inputKey)->first();
        // Check if configuration exists
        if (null !== $configuration && $configuration->exists()) {
            $fullPath = $configuration->configuration_value;
            if (is_file($configuration->configuration_value)) {
                // File exists
                unlink($configuration->configuration_value);
            }
        }
    }
}
