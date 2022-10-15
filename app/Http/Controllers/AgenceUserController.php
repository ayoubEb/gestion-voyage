<?php

namespace App\Http\Controllers;

use App\Models\Agence;
use App\Models\AgenceUser;
use App\Models\User;
use Illuminate\Http\Request;

class AgenceUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $agenceUser = AgenceUser::all();
        return view("admin.agence-user.index")->with("agenceUsers",$agenceUser);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $agences = Agence::all();
      $users = User::all();
        return view("admin.agence-user.create")->with(['users'=>$users,'agences'=>$agences]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        AgenceUser::create([
          "agence_id"=>$request->agence_id,
          "user_id"=>$request->user_id,
        ]);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AgenceUser  $agenceUser
     * @return \Illuminate\Http\Response
     */
    public function show(AgenceUser $agenceUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AgenceUser  $agenceUser
     * @return \Illuminate\Http\Response
     */
    public function edit(AgenceUser $agenceUser)
    {
      $user = User::all();
      $agence = Agence::all();
        return view("admin.agence-user.edit")->with([
          'users'=>$user,
          'agences'=>$agence,
          'agenceUser'=>$agenceUser
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AgenceUser  $agenceUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AgenceUser $agenceUser)
    {
        $agenceUser->update([
          "agence_id"=>$request->agence_id,
          "user_id"=>$request->user_id,
        ]);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AgenceUser  $agenceUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(AgenceUser $agenceUser)
    {
        $agenceUser->delete();
        return back();
    }
    public function GetAgence(){
      $data = Agence::all();
      $user = User::all();
      return response()->json([
        'data'=>$data,
        'user'=>$user
      ]);
    }

}
