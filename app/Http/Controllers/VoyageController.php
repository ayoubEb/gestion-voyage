<?php

namespace App\Http\Controllers;

use App\Models\CaracteristiqueValeur;
use App\Models\Chauffeur;
use App\Models\Hotel;
use App\Models\HotelCaracteristique;
use App\Models\Transport;
use App\Models\Voyage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class VoyageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $voyages = Voyage::all();
        return view("admin.voyages.index")->with('voyages',$voyages);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $transports = Transport::all();
      $chauffeurs = Chauffeur::all();
      $hotels = HotelCaracteristique::all();
        return view('admin.voyages.create')->with([
          "transports"=>$transports,
          "chauffeurs"=>$chauffeurs,
          "hotels"=>$hotels
        ]);
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
        "nom"=>["required"],
        "date_depart"=>["required"],
        "date_retour"=>["required"],
        "heure_lance"=>["required"],
        "heure_retour"=>["required"],
        "ville_depart"=>["required"],
        "ville_destination"=>["required"],
        "prix"=>["required"],
        "transport_id"=>["required"],
        "chauffeur_id"=>["required"],
        "hotel_id"=>["required"],
      ]);
      $start_date = Carbon::parse($request->date_depart);
      $end_date = Carbon::parse($request->date_retour);
      $nombre_jour = $end_date->diffInDays($start_date);


        Voyage::create([
          "transport_id"=>$request->transport_id,
          "chauffeur_id"=>$request->chauffeur_id,
          "hotel_caracteristique_id"=>$request->hotel_id,
          "nom"=>$request->nom,
          "date_depart"=>$request->date_depart,
          "date_retour"=>$request->date_retour,
          "heure_lance"=>$request->heure_lance,
          "heure_retour"=>$request->heure_retour,
          "ville_depart"=>$request->ville_depart,
          "ville_destination"=>$request->ville_destination,
          "prix"=>$request->prix,
          "nombre_jour"=>$nombre_jour,
        ]);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Voyage  $voyage
     * @return \Illuminate\Http\Response
     */
    public function show(Voyage $voyage)
    {
      return view("admin.voyages.show")->with("voyage",$voyage);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Voyage  $voyage
     * @return \Illuminate\Http\Response
     */
    public function edit(Voyage $voyage)
    {
      $chauffeurs=Chauffeur::all();
      $transports=Transport::all();
      $hotel_caracteristique = HotelCaracteristique::all();
      return view("admin.voyages.edit")->with([
        "voyage"=>$voyage,
        "chauffeurs"=>$chauffeurs,
        "transports"=>$transports,
        "hotel_caracteristique"=>$hotel_caracteristique
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Voyage  $voyage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Voyage $voyage)
    {
      $request->validate([
        "nom"=>["required"],
        "date_depart"=>["required"],
        "date_retour"=>["required"],
        "heure_lance"=>["required"],
        "heure_retour"=>["required"],
        "ville_depart"=>["required"],
        "chauffeur"=>["required"],
        "transport"=>["required"],
        "hotel_caracteristique"=>["required"],
      ]);
      $start_date = Carbon::parse($request->date_depart);
      $end_date = Carbon::parse($request->date_retour);
      $nombre_jour = $end_date->diffInDays($start_date);
      $voyage->update([
        "nom"=>$request->nom,
        "date_depart"=>$request->date_depart,
        "date_retour"=>$request->date_retour,
        "heure_lance"=>$request->heure_lance,
        "heure_retour"=>$request->heure_retour,
        "ville_depart"=>$request->ville_depart,
        "ville_destination"=>$request->ville_destination,
        "nombre_jour"=>$nombre_jour,
        "chauffeur_id"=>$request->chauffeur,
        "transport_id"=>$request->transport,
        "hotel_caratcteristique_id"=>$request->hotel_caracteristique,
      ]);
      return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Voyage  $voyage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Voyage $voyage)
    {
        $voyage->delete();
        return back();
    }
    public function getHotelCaracter(Request $request){
      // $data = HotelCaracteristique::where('hotel_id',$request->id)->get();
      $data = DB::table('caracteristiques')
      ->join('caracteristique_valeurs','caracteristiques.id','=','caracteristique_valeurs.caracteristique_id')
      ->join('hotel_caracteristiques','caracteristique_valeurs.id','=','hotel_caracteristiques.caracteristique_valeur_id')
      ->select("*")
      ->where('hotel_id','=',$request->id)
      ->get();

      return response()->json($data);
    }

    public function getHotelCaracterVal(Request $request){


      $data = DB::table('caracteristique_valeurs')
      ->join('hotel_caracteristiques','caracteristique_valeurs.id','=','hotel_caracteristiques.caracteristique_valeur_id')
      ->join('hotel_caracteristique','hotels.id','=','hotel_caracteristique.hotel_id')
      ->select("*")
      ->where('hotel_caracteristiques.hotel_id',$request->id)

      ->get();

      return response()->json($data);
    }

    public function listePDF(){
      $voyages = Voyage::all();
      $pdf = PDF::loadView('admin.voyages.liste-pdf',compact('voyages'));
      return $pdf->stream();
    }
}
