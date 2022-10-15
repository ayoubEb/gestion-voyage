<?php

namespace App\Http\Controllers;

use App\Models\Agence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AgenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $agence = Agence::all();
        return view("admin.agences.index")->with('agence',$agence);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.agences.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      if(empty($request->logo) and empty($request->nom) and empty($request->email) and empty($request->adresse) and empty($request->ville) and empty($request->ice) and empty($request->patente))
      {
        Session()->flash("remplir","Attention : vous avez remplir en tous les champs");
        $request->validate([
          "logo"=>['required'],
          "nom"=>['required','not_regex:/^([a-z]+[0-9]+)|([A-Z]+[0-9]+)|([0-9]+)|([0-9]+[a-z]+)|([0-9]+[A-Z]+)$/'],
          "email"=>['required','unique'],
          "adresse"=>['required'],
          "ville"=>['required','not_regex:/^([a-z]+[0-9]+)|([A-Z]+[0-9]+)|([0-9]+)|([0-9]+[a-z]+)|([0-9]+[A-Z]+)$/'],
          "ice"=>['regex:/^[0-9]+$/','required'],
          "patente"=>['regex:/^[0-9]+$/','required'],
        ]);
        return back();
      }
      else
      {
        $request->validate([
          "logo"=>['required'],
          "nom"=>['required','not_regex:/^([a-z]+[0-9]+)|([A-Z]+[0-9]+)|([0-9]+)|([0-9]+[a-z]+)|([0-9]+[A-Z]+)$/'],
          "email"=>['required'],
          "adresse"=>['required'],
          "ville"=>['required','not_regex:/^([a-z]+[0-9]+)|([A-Z]+[0-9]+)|([0-9]+)|([0-9]+[a-z]+)|([0-9]+[A-Z]+)$/'],
          "ice"=>['regex:/^[0-9]+$/','required'],
          "patente"=>['regex:/^[0-9]+$/','required'],
        ]);


        if($request->hasFile("logo")){
          $file = $request->file('logo');
          $extention = $file->getClientOriginalExtension();
          $filename = time().".".$extention;
          $file->move('images/agence/',$filename);

        }
        Agence::create([
          "logo"=>$filename,
          "nom"=>$request->nom,
          "email"=>$request->email,
          "adresse"=>$request->adresse,
          "ville"=>$request->ville,
          "ice"=>$request->ice,
          "patente"=>$request->patente,
        ]);
        toast("L'enrregistrement d'agence effectuée","succes");
        return back();
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Agence  $agence
     * @return \Illuminate\Http\Response
     */
    public function show(Agence $agence)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Agence  $agence
     * @return \Illuminate\Http\Response
     */
    public function edit(Agence $agence)
    {
      return view("admin.agences.edit")->with('agence',$agence);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Agence  $agence
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agence $agence)
    {
      if(empty($request->nom_u) or empty($request->email_u) or empty($request->adresse_u) or empty($request->ville_u) or empty($request->ice_u) or empty($request->patente_u))
      {
        Session()->flash("remplir","Attention : vous avez remplir en tous les champs");
        $request->validate([
          // "logo"=>['required','mines;jpg,jpeg,png'],
          "nom_u"=>['required','not_regex:/^([a-z]+[0-9]+)|([A-Z]+[0-9]+)|([0-9]+)|([0-9]+[a-z]+)|([0-9]+[A-Z]+)$/'],
          "email_u"=>['required'],
          "adresse_u"=>['required'],
          "ville_u"=>['required','not_regex:/^([a-z]+[0-9]+)|([A-Z]+[0-9]+)|([0-9]+)|([0-9]+[a-z]+)|([0-9]+[A-Z]+)$/'],
          "ice_u"=>['regex:/^[0-9]+$/','required'],
          "patente_u"=>['regex:/^[0-9]+$/','required'],
        ]);
        return back();
      }
      else{
        $request->validate([
          // "logo"=>['required','mines;jpg,jpeg,png'],
          "nom_u"=>['required','not_regex:/^([a-z]+[0-9]+)|([A-Z]+[0-9]+)|([0-9]+)|([0-9]+[a-z]+)|([0-9]+[A-Z]+)$/'],
          "email_u"=>['required'],
          "adresse_u"=>['required'],
          "ville_u"=>['required','not_regex:/^([a-z]+[0-9]+)|([A-Z]+[0-9]+)|([0-9]+)|([0-9]+[a-z]+)|([0-9]+[A-Z]+)$/'],
          "ice_u"=>['regex:/^[0-9]+$/','required'],
          "patente_u"=>['regex:/^[0-9]+$/','required'],
        ]);
        if($request->has("logo_u")){
          $file = $request->logo_u;
          $extention = $file->getClientOriginalExtension();
          $filename = time().".".$extention;
          $file->move("images/agence",$filename);
          unlink(public_path("images/agence").'/'.$agence->logo);
          // $agence->logo = $filename;
          $agence->update([
            "logo"=>$filename,
          ]);
          // $agence->save();
        }
        $agence->update([
          // "logo"=>$request->logo_u,
          "nom"=>$request->nom_u,
          "ice"=>$request->ice_u,
          "email"=>$request->email_u,
          "adresse"=>$request->adresse_u,
          "ville"=>$request->ville_u,
          "patente"=>$request->patente_u,
        ]);
        // dd($request->a);
        Session()->flash("update","La notification d'agence ".$agence->nom." effectuée");
        return back();
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Agence  $agence
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agence $agence)
    {
        $agence->delete();
        toast("La suppression d'agence effectuée");
        return back();
    }
}
