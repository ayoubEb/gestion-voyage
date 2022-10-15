<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
    public function show(User $user){
      return view("admin.profil.show")->with('user',$user);
    }
    public function edit(User $user){
      return view("admin.profil.edit")->with('user',$user);
    }
    public function update(Request $request, User $user){
      $user = Auth::user();
      $user->name = $request->name;
      $user->email = $request->email;
      $user->phone = $request->phone;
      if($request->password_confirm != null){
        $user->password == Hash::make($request->password_confirm);
      }
        $user->save();


      return back();
    }
}
