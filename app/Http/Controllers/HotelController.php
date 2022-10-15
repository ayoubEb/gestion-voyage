<?php

namespace App\Http\Controllers;

use App\Models\Attribut;
use App\Models\AttributValue;
use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $hotels = Hotel::all();
      $attributs = Attribut::all();
        return view("admin.hotels.index")->with(["hotels"=>$hotels,"attributs"=>$attributs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.hotels.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      if(empty($request->nom) or empty($request->adresse) or empty($request->ville) or empty($request->cp) or empty($request->email) or empty($request->telephone)){
        Session()->flash("remplir","Attenton : vous avez remplir en tous les champs");
        return back();
      }
      else{
        $request->validate([
          "nom"=>['required','not_regex:/^([a-z]+[0-9]+)|([A-Z]+[0-9]+)|([0-9]+)|([0-9]+[a-z]+)|([0-9]+[A-Z]+)$/'],
          "adresse"=>["required"],
          "ville"=>['required','not_regex:/^([a-z]+[0-9]+)|([A-Z]+[0-9]+)|([0-9]+)|([0-9]+[a-z]+)|([0-9]+[A-Z]+)$/'],
          "cp"=>["required","regex:/^(\d)+$/"],
          "email"=>["required"],
          'telephone'=>['required','not_regex:/^([a-z]+)|([A-Z]+)|([A-Za-z]+)|([a-zA-Z]+)$/'],
        ]);
        $hotel = Hotel::create([
          "nom_h"=>Str::upper($request->nom),
          "adresse_h"=>$request->adresse,
          "ville_h"=>$request->ville,
          "cp_h"=>$request->cp,
          "telephone_h"=>$request->telephone,
          "email_h"=>$request->email,
        ]);
        if(isset($request->value)){

          $hotel_att = $hotel->attribut_values()->create([
            "hotel_id"=>$hotel->id,
            "attribut_value_id"=>$request->value,
            "prix"=>$request->prix,
          ]);
          if($hotel_att){
            session()->put("add-hotel",$hotel->id);
            toast("L'enregistrement d'hôtel en plus attribut effectuée","success");
            return back();
          }
        }
      }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function show(Hotel $hotel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function edit(Hotel $hotel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hotel $hotel)
    {
      if($request->nom =="" or $request->adresse =="" or $request->cp =="" or $request->telephone =="" or $request->ville =="" or $request->email ==""){
        Session()->flash("remplir","Attention vous avez oublié un champ ou plusieurs champs");
        return back();
      }
      else{
        $hot = $hotel->update([
          "nom_h"=>Str::upper($request->nom),
          "adresse_h"=>$request->adresse,
          "ville_h"=>$request->ville,
          "cp_h"=>$request->cp,
          "telephone_h"=>$request->telephone,
          "email_h"=>$request->email,
        ]);
        session()->put("update-hotel",$hotel->id);
          Session()->flash("update","La notificaton d'hôtel ".$hotel->nom_h." effectuée");
          return back();

      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hotel $hotel)
    {
      $hot = $hotel->delete();
      if($hot){
        toast("L'enregistrement d'hôtel effectuée","success");
        return back();
      }
    }

    public function getAttribut(Request $request){
      $att_val = AttributValue::where('attribut_id',$request->id)
      ->get();
      return response()->json($att_val);
    }
}
