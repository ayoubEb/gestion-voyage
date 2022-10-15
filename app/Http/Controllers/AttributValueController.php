<?php

namespace App\Http\Controllers;

use App\Models\AttributValue;
use Illuminate\Http\Request;

class AttributValueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AttributValue  $attributValue
     * @return \Illuminate\Http\Response
     */
    public function show(AttributValue $attributValue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AttributValue  $attributValue
     * @return \Illuminate\Http\Response
     */
    public function edit(AttributValue $attributValue)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AttributValue  $attributValue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AttributValue $attributValue)
    {
      if(empty($request->value)){
        Session()->flash('remplir',"Attention : vous avez remplir le champ de valeur");
        return back();
      }
      else{
        $att_val = $attributValue->update([
          "attribut_id"=>$request->attribut_id,
          "valeur"=>$request->value,
        ]);
        if($att_val){
          session()->flash("update","La notification d'attribut ".$attributValue->attribut->nom." de valeur ".$attributValue->valeur);
          return back();
        }

      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AttributValue  $attributValue
     * @return \Illuminate\Http\Response
     */
    public function destroy(AttributValue $attributValue)
    {
        //
    }
}
