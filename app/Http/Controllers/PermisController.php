<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use App\Models\Permis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PermisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $permis = Permis::all();
      $chauffeurs = Employe::where('poste',"Chauffeur")->get();
        return view("admin.permis.index")->with([
          "permis"=>$permis,
          'chauffeurs'=>$chauffeurs
        ]);
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
      if(empty($request->employe) or empty($request->type)){
        Session()->flash("remplir","Attenton : vous avez remplir en tous les champs");
        return back();
      }
      else{
        $request->validate([
          "employe"=>["required"],
          "type"=>["required"],
        ]);
        $per = Permis::create([
          "employe_id"=>$request->employe,
          "type"=>$request->type,
        ]);
        if($per){
          toast("L'enregistrement du permis effectuée","success");
          return back();
        }
      }
    }

      /**
     * Display the specified resource.
     *
     * @param  \App\Models\Permis  $permis
     * @return \Illuminate\Http\Response
     */
    public function show(Permis $permis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Permis  $permis
     * @return \Illuminate\Http\Response
     */
    public function edit(Permis $permis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Permis  $permis
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permis $permis)
    {

    if(empty($request->employe) or empty($request->type)){
      Session()->flash("remplir","Attention vous avez oublié un champ ou plusieurs champs");
      return back();
    }
    else{

    }
      $request->validate([
        "employe"=>["required"],
        "type"=>["required"],
      ]);

      $permis->update([
        "employe_id"=>$request->employe,
        "type"=>$request->type,

      ]);
          Session()->flash("update","La notificaton du permis ".$permis->employe->name." effectuée");
        return back();

      // }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Permis  $permis
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permis $permis)
    {


       $del = $permis->delete();
        if($del){
          toast("La suppression du permis effectuée","success");
          return back();

        }
    }
}
