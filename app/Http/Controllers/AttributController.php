<?php

namespace App\Http\Controllers;

use App\Models\Attribut;
use App\Models\AttributValue;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class AttributController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $attributs = Attribut::all();
        return view("admin.attribut.index")->with("attributs",$attributs);
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
      if(empty($request->attribut)){
        Session()->flash("remplir","Attention : remplir le champ de nom d'attrbut");
        return back();
      }
      else{
        $request->validate([
          "attribut"=>['required','not_regex:/^([a-z]+[0-9]+)|([A-Z]+[0-9]+)|([0-9]+)|([0-9]+[a-z]+)|([0-9]+[A-Z]+)$/'],
        ]);
        $attribut = Attribut::create([
          "nom"=>$request->attribut,
        ]);
        if(isset($request->value)){
          foreach ($request->value as $key => $value) {
            AttributValue::create([
              "attribut_id"=>$attribut->id,
              "valeur"=>$request->value[$key],
            ]);
          }
        }
        if($attribut){
          toast("L'enregistrement d'attribut effectuée","success");
          return back();
        }
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Attribut  $attribut
     * @return \Illuminate\Http\Response
     */
    public function show(Attribut $attribut)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attribut  $attribut
     * @return \Illuminate\Http\Response
     */
    public function edit(Attribut $attribut)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Attribut  $attribut
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attribut $attribut)
    {
      if(empty($request->attribut)){
        Session()->flash('remplir',"Attention : vous avez remplir le champ de nom l'attribut");
        return back();
      }
      else{
        $request->validate([
          "attribut"=>['required','not_regex:/^([a-z]+[0-9]+)|([A-Z]+[0-9]+)|([0-9]+)|([0-9]+[a-z]+)|([0-9]+[A-Z]+)$/'],
        ]);
          $attribut->update([
            "nom"=>$request->attribut,
          ]);
          if($attribut){
            Session()->flash("update","La notificaton d'attribut ".$attribut->nom." effectuée");
            return back();
          }
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attribut  $attribut
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attribut $attribut)
    {
        $att = $attribut->delete();
        if($att){
          toast("La suppression effectuée","success");
          return back();
        }
    }
}
