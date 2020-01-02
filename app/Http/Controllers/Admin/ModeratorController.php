<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Company;
use App\User;
use function foo\func;
use Illuminate\Http\Request;

class ModeratorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $moderators = User::whereHas("roles", function($q){
            $q->where("name", "Moderator");
        })->get();
        return view('admin.role.moderator', compact('moderators'));
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

    public function getCompanies($id){
        $user = User::find($id);
        $companies = Company::all();
        return view('admin.role.assignCompany', compact('user', 'companies'));
    }
    public function assignCompany(Request $request){
        $user_id = $request->user_id;
        $company_id = $request->company_id;
        $company = Company::find($company_id);
        $update = $company->update([
            'moderator_id' => $user_id,
        ]);
        if($update){
            return response()->json(['status'=>'success'], 200);
        }
        else{
            return response()->json(['status'=>'error'], 500);
        }
    }
    public function revokeCompany(Request $request){
        $company_id = $request->company_id;
        $company = Company::find($company_id);
        $update = $company->update([
            'moderator_id' => null,
        ]);
        if($update){
            return response()->json(['status'=>'success'], 200);
        }
        else{
            return response()->json(['status'=>'error'], 500);
        }
    }
    public function getUsers($id){
        $users = User::whereHas('roles', function ($q){
            $q->where('name', 'User');
        })->get();
        $moderator = User::find($id);
        return view('admin.role.assignUser', compact('users', 'moderator'));
    }
    public function assignUser(Request $request){
        $user_id = $request->user_id;
        $moderator_id = $request->moderator_id;
        $user = User::find($user_id);
        $update = $user->update([
            'moderator_id' => $moderator_id,
        ]);
        if($update){
            return response()->json(['status'=>'success'], 200);
        }
        else{
            return response()->json(['status'=>'error'], 500);
        }
    }
    public function revokeUser(Request $request){
        $user_id = $request->user_id;
        $user = User::find($user_id);
        $update = $user->update([
            'moderator_id' => null,
        ]);
        if($update){
            return response()->json(['status'=>'success'], 200);
        }
        else{
            return response()->json(['status'=>'error'], 500);
        }
    }
}
