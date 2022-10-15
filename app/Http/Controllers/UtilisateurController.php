<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Role;
use RealRashid\SweetAlert\Facades\Alert;
use PDF;
class UtilisateurController extends Controller
{
    public function index(){
        $users = User::all();
      return view("admin.utilisateurs.index")->with("users",$users);
    }
    public function create(){
      $roles = Role::pluck('name','name')->all();
        return view("admin.utilisateurs.create")->with('roles',$roles);
    }
    public function store(Request $request){
      $request->validate([
        "password"=>["required","confirmed","min:8"],
        'name'=>['required','not_regex:/^([a-z]+[0-9]+)|([A-Z]+[0-9]+)|([0-9]+)|([0-9]+[a-z]+)|([0-9]+[A-Z]+)$/'],
        'email'=>['required'],
        'cnie'=>['required'],
        'travail'=>['required'],
        'poste'=>['required'],
        'genre'=>['required'],
        'telephone'=>['required','not_regex:/^([a-z]+)|([A-Z]+)|([A-Za-z]+)|([a-zA-Z]+)$/'],
        'adresse'=>['required','not_regex:/^([a-z]+[0-9]+)|([A-Z]+[0-9]+)|([0-9]+)|([0-9]+[a-z]+)|([0-9]+[A-Z]+)$/'],
        'ville'=>['required','not_regex:/^([a-z]+[0-9]+)|([A-Z]+[0-9]+)|([0-9]+)|([0-9]+[a-z]+)|([0-9]+[A-Z]+)$/'],
        'nationalite'=>['required','not_regex:/^([a-z]+[0-9]+)|([A-Z]+[0-9]+)|([0-9]+)|([0-9]+[a-z]+)|([0-9]+[A-Z]+)$/'],
        'pays'=>['required','not_regex:/^([a-z]+[0-9]+)|([A-Z]+[0-9]+)|([0-9]+)|([0-9]+[a-z]+)|([0-9]+[A-Z]+)$/'],
      ]);
      $user = new User();
      if($request->hasFile("image")){
        $file = $request->file('image');
        $extention = $file->getClientOriginalExtension();
        $filename = time().".".$extention;
        $file->move('images/user/',$filename);
        $user->image = $filename;
      }
      $user->name=$request->name;
      $user->email=$request->email;
      $user->password=Hash::make($request->password);
      $user->role=$request->role;
      $user->cnie=$request->cnie;
      $user->adresse=$request->adresse;
      $user->ville=$request->ville;
      $user->pays=$request->pays;
      $user->nationalite=$request->nationalite;
      $user->telephone=$request->telephone;
      $user->genre=$request->genre;
      $user->poste=$request->poste;
      $user->travail=$request->travail;
      $user->role=$request->role;


      // $user->name=$request->name;
      // $user->email=$request->email;
      // $user->role=$request->role;
      // $user->phone=$request->phone;
      $user->assignRole($request->input('roles'));
      $user->save();
        if($user){
          Alert::success('Success','L\'enregitrement effectuée');
          return back();
        }
      }

      public function destroy($id){
        $del_user = User::find($id);
        $del_user->delete();
        if($del_user){
          // toast('La suppression d\'utilisateur effectuée','warning');
          Alert::warning('Warning','La suppression d\'utilisateur effectuée');
          return back();
        }

      return back();
    }
    public function edit(User $user){
      $roles = Role::pluck('name','name')->all();
      $userRole = $user->roles->pluck('name','name')->all();
      return view('admin.utilisateurs.edit')->with(["user"=>$user,'userRole'=>$userRole,"roles"=>$roles]);
    }



    public function update(User $user,Request $request){
      $user->name=$request->name;
      $user->email=$request->email;
      $user->password=Hash::make($request->password);
      $user->role=$request->role;
      $user->cnie=$request->cnie;
      $user->adresse=$request->adresse;
      $user->ville=$request->ville;
      $user->pays=$request->pays;
      $user->nationalite=$request->nationalite;
      $user->telephone=$request->telephone;
      $user->genre=$request->genre;
      $user->poste=$request->poste;
      $user->travail=$request->travail;
      $user->role=$request->role;
      if($request->hasFile("photo")){
        $file = $request->file('photo');
        $extention = $file->getClientOriginalExtension();
        $filename = time().".".$extention;
        $file->move('images/user/',$filename);
        unlink(public_path("images/user").'/'.$user->photo);
        $user->photo = $filename;
      }
      else{
        $user->photo="avatar-2.jpg";
      }

      if($request->password != null){
        $user->password == Hash::make($request->password);
      }

      DB::table('model_has_roles')->where('model_id',$user->id)->delete();
      $user->assignRole($request->input('roles'));
      $user->save();
      if($user){
        toast('La notification d\'utilisateur effectuée','success');
        return back();
      }
      return back();
    }
    public function show(User $user){
      return view("admin.utilisateurs.show")->with('user',$user);
    }



    public function carteTravail(User $user){
      $pdf = PDF::loadView('admin.utilisateurs.carte-travail', compact('user'))->setPaper("a5",array(360,360))->setOptions(['defaultFont' => 'sans-serif']);
      $customPaper = array(0,0,360,200);
    $pdf->set_paper($customPaper);
      return $pdf->stream();
    }
}
