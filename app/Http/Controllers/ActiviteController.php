<?php

namespace App\Http\Controllers;

use App\Models\Activite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class ActiviteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $activites = Activite::all();
        return view("admin.activites.index")->with("activites",$activites);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.activites.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      if(empty($request->theme)){
        Session()->flash("remplir","Remplir le champ de nom du théme");
        return back();
      }
      else{
        $request->validate([
          "theme"=>["required"],
        ]);
        $activite = Activite::create([
          "theme"=>$request->theme,
        ]);
        if(isset($request->destination)){

            $activite->theme_activite()->create([
              "activite_id"=>$activite->id,
              "destination"=>Str::upper($request->destination),
              "depart"=>$request->depart,
              "arrive"=>$request->arrrive,
              "enfant"=>$request->enfant,
              "adulte"=>$request->adulte,
              "prix"=>$request->prix,


            ]);

        }
        if($activite){
          toast("L'enregistrement effecutée",'success');
          return redirect()->route("activite.index");
        }

      }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Activite  $activite
     * @return \Illuminate\Http\Response
     */
    public function show(Activite $activite)
    {


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Activite  $activite
     * @return \Illuminate\Http\Response
     */
    public function edit(Activite $activite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Activite  $activite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Activite $activite)
    {
      if(empty($request->theme)){
        Session()->flash("remplir","Remplir le nom di théme");
        return back();
      }
      else{

        $activite->update([
          "theme"=>$request->theme,
        ]);
        if(isset($request->destination)){
          $activite->theme_activite()->update([
            "activite_id"=>$activite->id,
            "destination"=>Str::upper($request->destination),
            "depart"=>$request->depart,
            "arrive"=>$request->arrive,
            "adulte"=>$request->adulte,
            "enfant"=>$request->enfant,
          ]);
        }

        if($activite){
          // toast("La notification d'activité success","success");
          Session()->flash("update","La notificaton du théme ".$activite->theme." effectuée");
          return back();
        }
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Activite  $activite
     * @return \Illuminate\Http\Response
     */
    public function destroy(Activite $activite)
    {
      $activite->delete();
      if($activite){
        toast("La suppression d'activité success","success");
        return back();
      }
    }
}
