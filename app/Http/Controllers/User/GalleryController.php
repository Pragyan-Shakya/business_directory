<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Model\Company;
use App\Model\Gallery;
use App\Repositories\Repository;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use FileUpload;
use Intervention\Image\Image;

class GalleryController extends Controller
{
    protected $model;

    public function __construct(Gallery $gallery)
    {
        $this->model = new Repository($gallery);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->hasCompany()){
            $company = Company::where('user_id', auth()->user()->id)->first();
            $galleries = $company->galleries;
            return view('user.gallery.index', compact('galleries'));
            // get all pictures
//            $pictures = Picture::all();

        }else{
            return redirect(404);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        dd(asset('public\assets\uploads\galleries'));
//        dd(public_path('assets\uploads\galleries'));
//        return view('user.gallery.create');
        if(auth()->user()->hasCompany()){
            $company = Company::where('user_id', auth()->user()->id)->first();
            $pictures = $company->galleries;
//            return view('user.gallery.index', compact('galleries'));
            // get all pictures
//            $pictures = Picture::all();
            // add properties to pictures
            $pictures->map(function ($picture) {
                $picture['name'] = $picture['title'];
                $picture['url'] = asset($picture['image']);
                $picture['size'] = '';
                $picture['thumbnailUrl'] = asset($picture['image']);
                $picture['deleteType'] = 'DELETE';
                $picture['deleteUrl'] = route('user.gallery.destroy', $picture->id);
                return $picture;
            });
            // show all pictures
            return response()->json(['files' => $pictures]);
        }else{
            return redirect(404);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $company = Company::where('user_id', auth()->user()->id)->first();
        // create upload path if it does not exist
        $path = public_path('assets/uploads/galleries');
        $path2 = asset('public/assets/uploads/galleries/');

        // Simple validation (max file size 20MB and only two allowed mime types)
        $validator = new FileUpload\Validator\Simple('20M', ['image/png', 'image/jpg', 'image/jpeg']);
        // Simple path resolver, where uploads will be put
        $pathresolver = new FileUpload\PathResolver\Simple($path);
        // The machine's filesystem
        $filesystem = new FileUpload\FileSystem\Simple();
        // FileUploader itself
        $fileupload = new FileUpload\FileUpload($_FILES['files'], $_SERVER);
        $slugGenerator = new FileUpload\FileNameGenerator\Slug();
        // Adding it all together. Note that you can use multiple validators or none at all
        $fileupload->setPathResolver($pathresolver);
        $fileupload->setFileSystem($filesystem);
        $fileupload->addValidator($validator);
        $fileupload->setFileNameGenerator($slugGenerator);

        // Doing the deed
        list($files, $headers) = $fileupload->processAll();
        // Outputting it, for example like this
        foreach($headers as $header => $value) {
            header($header . ': ' . $value);
        }
        foreach($files as $file){
            //Remember to check if the upload was completed
            if ($file->completed) {
                // set some data
                $filename = $file->getFilename();
                $url = $path2 .'/'. $filename;

                // save data
                $gallery = Gallery::create([
                    'title' => $filename,
                    'image' => 'public/assets/uploads/galleries/'. $filename,
                    'company_id' => $company->id,
                    'ststus' => 'Active',
                ]);

                // prepare response
                $data[] = [
                    'size' => $file->size,
                    'name' => $filename,
                    'url' => $url,
                    'thumbnailUrl' => $url,
                    'deleteType' => 'DELETE',
                    'deleteUrl' => route('user.gallery.destroy', $gallery->id),
                ];

                // output uploaded file response
                return response()->json(['files' => $data]);
            }
        }
        // errors, no uploaded file
        return response()->json(['files' => $files]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallery $gallery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gallery $gallery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $picture = $this->model->show($id);
        if($picture->image && is_file($picture->image)){
            unlink($picture->image);
        }
        $this->model->delete($id);
        return response()->json([$picture->url]);
    }
}
