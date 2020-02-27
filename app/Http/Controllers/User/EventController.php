<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventRequest;
use App\Model\Company;
use App\Model\Event;
use App\Repositories\Repository;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class EventController extends Controller
{
    protected $model;

    public function __construct(Event $event)
    {
        $this->model = new Repository($event);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company = Company::where('user_id', auth()->user()->id)->first();
        $events = $company->events;
        return view('user.event.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.event.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventRequest $request)
    {
        $data = $request->except('_token');
        $company = Company::where('user_id', auth()->user()->id)->first();
        $data['company_id'] = $company->id;
        if($files = $request->file('image')) {
//            if($user->avatar && is_file($user->avatar)){
//                unlink($user->avatar);
//            }
            // for save original image
            $ImageUpload = Image::make($files)->resize(800, 500);
            $originalPath = 'public/assets/uploads/events/'.time().$files->getClientOriginalName();
            $ImageUpload->save($originalPath);
            $data['image'] = $originalPath;
        }
        if($this->model->create($data)){
            return redirect()->route('user.event.index')->with('success', 'Event Added!!!');
        }
        else{
            return redirect()->back()->with('error', 'Something Went Wrong!!!');
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
        $event = $this->model->show($id);
        return view('user.event.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EventRequest $request, $id)
    {
        $data = $request->except(['_token', '_method']);
        $event = $this->model->show($id);
        if($files = $request->file('image')) {
            if($event->image && is_file($event->image)){
                unlink($event->image);
            }
//             for save original image
            $ImageUpload = Image::make($files)->resize(800, 500);
            $originalPath = 'public/assets/uploads/events/'.time().$files->getClientOriginalName();
            $ImageUpload->save($originalPath);
            $data['image'] = $originalPath;
        }
        if($this->model->update($data, $id)){
            return redirect()->route('user.event.index')->with('success', 'Event Updated!!!');
        }
        else{
            return redirect()->back()->with('error', 'Something Went Wrong!!!');
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
        $event = $this->model->show($id);
        if($event->image && is_file($event->image)){
            unlink($event->image);
        }
        $this->model->delete($id);
        return redirect()->back()->with('success', 'Event Deleted!!!');
    }
}
