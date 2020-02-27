<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Model\Company;
use App\Model\Notice;
use App\Repositories\Repository;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    protected $model;

    public function __construct(Notice $notice)
    {
        $this->model = new Repository($notice);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company = Company::where('user_id', auth()->user()->id)->first();
        $notices = $company->notices;
        return view('user.notice.index', compact('notices'));
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
        $company = Company::where('user_id', auth()->user()->id)->first();
        $data = $request->except('_token');
        $data['company_id'] = $company->id;
        if($this->model->create($data)){
            return redirect()->route('user.notice.index')->with('success', 'Notice Added!!!');
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
        $notice = $this->model->show($id);
        return view('user.notice.edit', compact('notice'));
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
        $data = $request->except(['_token', '_method']);
        if($this->model->update($data, $id)){
            return redirect()->route('user.notice.index')->with('success', 'Notice Updated!!!');
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
        if($this->model->delete($id)){
            return redirect()->back()->with('success', 'Notice Deleted');
        }
    }
}
