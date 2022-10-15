<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use App\Models\Transport;
use Illuminate\Http\Request;

class TransportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $chaffeurs = Employe::where('poste','Chauffeur')->get();
      $transports = Transport::all();
      return view("admin.transports.index")->with([
        "transports"=>$transports,
        "chauffeurs"=>$chaffeurs
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
        $request->validate([
          "employe"=>["required"],
          "matricule"=>["required"],
          "boite"=>["required"],
          "capacite"=>["required"],
          "vitesse"=>["required"],
          "statut"=>["required"],
          "etat"=>["required"],
        ]);
        $transport = Transport::create([
          "employe_id"=>$request->employe,
          "matricule"=>$request->matricule,
          "boite"=>$request->boite,
          "capacite"=>$request->capacite,
          "vitesse"=>$request->vitesse,
          "statut"=>$request->statut,
          "etat"=>$request->etat,
        ]);
        if($transport){
          toast("L'enregistrement de transport effectué","success");
          return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transport  $transport
     * @return \Illuminate\Http\Response
     */
    public function show(Transport $transport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transport  $transport
     * @return \Illuminate\Http\Response
     */
    public function edit(Transport $transport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transport  $transport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transport $transport)
    {
      $request->validate([
        "employe"=>["required"],
        "matricule"=>["required"],
        "boite"=>["required"],
        "capacite"=>["required"],
        "vitesse"=>["required"],
        "statut"=>["required"],
        "etat"=>["required"],
      ]);
      $transport = $transport->update([
        "employe_id"=>$request->employe,
        "matricule"=>$request->matricule,
        "boite"=>$request->boite,
        "capacite"=>$request->capacite,
        "vitesse"=>$request->vitesse,
        "statut"=>$request->statut,
        "etat"=>$request->etat,
      ]);
      if($transport){
        toast("La suppression du transport effectué","success");
        return back();
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transport  $transport
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transport $transport)
    {
        $del=$transport->delete();
        if($del){
          toast("La suppression effectuée","success");
          return back();
        }
    }
}
