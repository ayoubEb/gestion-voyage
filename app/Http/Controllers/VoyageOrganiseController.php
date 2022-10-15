<?php

namespace App\Http\Controllers;

use App\Models\Caracteristique;
use App\Models\voyageOrganise;
// use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use PDF;
class VoyageOrganiseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $voyageOrganises = voyageOrganise::all();
      return view("admin.voyage_organise.index")->with('voyageOrganises',$voyageOrganises);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      // $caracteristiques = Caracteristique::all();
      return view("admin.voyage_organise.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate([
        "nom"=>["required","not_regex:/^[0-9]+$/"],
        "ville_destination"=>["required","not_regex:/^[0-9]+$/"],
        "pays_destination"=>["required","not_regex:/^[0-9]+$/"],
        "img"=>["required","mimes:jpg,png,jpeg"],
        "nombre_jour"=>["required"],
        "date_depart"=>["required"],
        "date_retour"=>["required"],
        "prix"=>["required","regex:/^([0-9](.[0.9])?)+$/"],
        "description"=>["required","not_regex:/^[0-9]+ $/"],
      ]);
      $voyageOrganise = new voyageOrganise();
      $voyageOrganise->nom=$request->nom;
      $voyageOrganise->ville_destination=$request->ville_destination;
      $voyageOrganise->pays_destination=$request->pays_destination;
      $voyageOrganise->nombre_jour=$request->nombre_jour;
      $voyageOrganise->date_depart=$request->date_depart;
      $voyageOrganise->date_retour=$request->date_retour;
      $voyageOrganise->prix=$request->prix;
      $voyageOrganise->description=$request->description;
      if($request->hasFile('img'))
      {
        $file = $request->file('img');
        $extention = $file->getClientOriginalExtension();
        $filename = time().".".$extention;
        $file->move('images/voyage_organisés/',$filename);
        $voyageOrganise->image=$filename;
      }
      $voyageOrganise->save();
      $voyageOrganise->reference = "ref-voyage-0".$voyageOrganise->id;
      $voyageOrganise->save();
      foreach($request->caracter as $key=>$val){

          $voyageOrganise->voyage_caracteristique()->create([
            "caracteristique_id"=>$request->caracter[$key],
          ]);
        }

      foreach($request->jours as $key=>$val){

        $voyageOrganise->voyage_programme()->create([
          "jours"=>$request->jours[$key],
          "titre"=>$request->titre[$key],
          "description"=>$request->programme[$key],
        ]);
        }

      return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\voyageOrganise  $voyageOrganise
     * @return \Illuminate\Http\Response
     */
    public function show(voyageOrganise $voyageOrganise)
    {
        return view("admin.voyage_organise.show")->with(["voyageOrganise"=>$voyageOrganise]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\voyageOrganise  $voyageOrganise
     * @return \Illuminate\Http\Response
     */
    public function edit(voyageOrganise $voyageOrganise)
    {
      $caracteristiques = Caracteristique::all();
        return view('admin.voyage_organise.edit')->with(["voyageOrganise"=>$voyageOrganise,"caracteristiques"=>$caracteristiques]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\voyageOrganise  $voyageOrganise
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, voyageOrganise $voyageOrganise)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\voyageOrganise  $voyageOrganise
     * @return \Illuminate\Http\Response
     */
    public function destroy(voyageOrganise $voyageOrganise)
    {
        $voyageOrganise->delete();
        return back();
    }
    public function exporterPDF(){
      $voyageOrganises = voyageOrganise::all();
      $pdf = PDF::LoadView('admin.voyage_organise.pdf',compact('voyageOrganises'));
      return $pdf->stream();
    }

    public function getVoyageOrganise(){
      $voyageOrganises = voyageOrganise::all();
      return view("front.voyage-organise")->with("voyageOrganises",$voyageOrganises);
    }
}
