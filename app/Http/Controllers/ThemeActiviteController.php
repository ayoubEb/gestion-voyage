<?php

namespace App\Http\Controllers;

use App\Models\Activite;
use App\Models\ThemeActivite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;


class ThemeActiviteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $ThemeActivites = ThemeActivite::all();
      $activites = Activite::all();
      return view("admin.theme-activite.index")->with([
        "ThemeActivites"=>$ThemeActivites,
        "activites"=>$activites
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view("admin.theme-activite.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      if(empty($request->activite_id) or empty($request->destination) or empty($request->depart) or empty($request->arrive) or empty($request->adulte) or empty($request->enfant)){
        Session()->flash("remplir","Attention : Remplir en tous les champs");
        $request->validate([
          "activite_id"=>['required'],
          "destination"=>['required','not_regex:/^([a-z]+[0-9]+)|([A-Z]+[0-9]+)|([0-9]+)|([0-9]+[a-z]+)|([0-9]+[A-Z]+)$/'],
          "depart"=>['required'],
          "arrive"=>['required'],
          "adulte"=>['required'],
          "enfant"=>['required'],
        ]);
        return back();
      }
      else{
        // foreach ($request->destination as $key => $value) {
          $themeActivite = ThemeActivite::create([
            "activite_id"=>$request->activite_id,
            "destination"=>Str::upper($request->destination),
            "depart"=>$request->depart,
            "arrive"=>$request->arrive,
            "adulte"=>$request->adulte,
            "enfant"=>$request->enfant,
          ]);
          // dd($themeActivite);:
        // }
        if($themeActivite){
          toast("L'enregistrement effecutée",'success');
          return redirect()->route("theme-activite.index");
        }
      }



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ThemeActivite  $themeActivite
     * @return \Illuminate\Http\Response
     */
    public function show(ThemeActivite $themeActivite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ThemeActivite  $themeActivite
     * @return \Illuminate\Http\Response
     */
    public function edit(ThemeActivite $themeActivite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ThemeActivite  $themeActivite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ThemeActivite $themeActivite)
    {
      if(empty($request->activite) or empty($request->destination) or empty($request->depart) or empty($request->arrive) or empty($request->enfant) or empty($request->adulte)){
        Session()->flash("remplir","Attention vous avez oublié un champ ou plusieurs champs");
        return back();
      }
      else{
        $themeActivite->update([
          "activite_id"=>$request->activite,
          "destination"=>Str::upper($request->destination),
          "depart"=>$request->depart,
          "arrive"=>$request->arrive,
          "enfant"=>$request->enfant,
          "adulte"=>$request->adulte,
        ]);
        // if($theme){
          // toast("La notification du théme activité de destination success","success");
        //  session()->put("att_id",$themeActivite->id);
          // Session()->flash("up","effectuée");:
          Session()->flash("update","La notificaton du théme ".$themeActivite->activite->theme." de destination ".$themeActivite->destination." effectuée");
          return back();
        // }

      }
      }

      /**
       * Remove the specified resource from storage.
       *
       * @param  \App\Models\ThemeActivite  $themeActivite
       * @return \Illuminate\Http\Response
       */
      public function destroy(ThemeActivite $themeActivite)
      {
        $theme = $themeActivite->delete();
      if($theme){
        toast("La suppression du théme activité success","success");
        return back();
      }
    }
    public function filterTheme(Request $request){


      // $query = ThemeActivite::query();
      $query = DB::table("activites")->join("theme_activites","activites.id","=","theme_activites.activite_id");
      if($request->ajax()){
          $th = $query->where(["activite_id"=>$request->id])->get();
          return response()->json($th);
      }

      return view("admin.theme-activite.index");
    }
}
