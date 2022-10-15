<?php

namespace App\Http\Controllers;

use App\Models\Agence;
use App\Models\Chauffeur;
use App\Models\Client;
use App\Models\Reservation;
use App\Models\Transport;
use App\Models\Voyage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;
use Carbon\Carbon;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservations = Reservation::all();
        return view("admin.reservations.index")->with('reservations',$reservations);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $voyages = Voyage::all();
      $agences = Agence::all();
      $transports = Transport::all();
      $chauffeurs = Chauffeur::all();

      return view("admin.reservations.create")->with([
        'voyages'=>$voyages,
        'agences'=>$agences,
        "transports"=>$transports,
        "chauffeurs"=>$chauffeurs]);
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

        "name"=>['required','not_regex:/^[0-9]+$/'],
        "telephone"=>['required','not_regex:/^([a-z]|[A-Z])+$/'],
        "email"=>['required'],
        "nom"=>["required"],
        "genre"=>['required'],
        // validation voyage
        "date_depart"=>["required"],
        "date_retour"=>["required"],
        "heure_lance"=>["required"],
        "heure_retour"=>["required"],
        "ville_destination"=>["required"],
        "prix"=>["required"],
        'gens_voyage'=>['required'],
        // validation transport
        "transport_id"=>["required"],
        // validation chauffeur
        "chauffeur_id"=>["required"],
        // validation reservation
        "mode"=>["required"],
        "statut"=>['required'],
        "agence"=>["required"],

      ]);
      $start_date = Carbon::parse($request->date_depart);
      $end_date = Carbon::parse($request->date_retour);
      $nombre_jour = $end_date->diffInDays($start_date);

      $client = new Client();
      $client->name         = $request->name;
      $client->telephone    = $request->telephone;
      $client->email        = $request->email;
      $client->genre        = $request->genre;
      $client->save();

      $voyage = new Voyage();
      $voyage->transport_id = $request->transport_id;
      $voyage->chauffeur_id = $request->chauffeur_id;
      $voyage->nom = $request->nom;
      $voyage->date_depart = $request->date_depart;
      $voyage->date_retour = $request->date_retour;
      $voyage->heure_lance = $request->heure_lance;
      $voyage->heure_retour = $request->heure_retour;
      $voyage->ville_destination = $request->ville_destination;
      $voyage->prix = $request->prix;
      $voyage->mode_paiement = $request->mode;
      $voyage->statut_payer = $request->statut;
      $voyage->nombre_jour = $nombre_jour;
      $voyage->gens_voyage = $request->gens_voyage;
      $voyage->save();

      $reservation = new Reservation();
      $reservation->client_id=$client->id;
      $reservation->voyage_id = $voyage->id;
      $reservation->agence_id = $request->agence;
      $reservation->valid_reservation = "non valider";
      $reservation->save();
      $reservation->num_reservation = "reservation-00".$reservation->id;
      $reservation->save();
        return back();

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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation)
    {
        return view("admin.reservations.show")->with('reservation',$reservation);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation)
    {
        return view("admin.reservations.edit")->with('reservation',$reservation);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservation $reservation)
    {
      $reservation->update([
        "valid_reservation"=>$request->valid_reservation,
      ]);
        $reservation->client()->update([
          "name"=>$request->name,
          "email"=>$request->email,
          "telephone"=>$request->telephone,
          "genre"=>$request->genre,

        ]);
        $start_date = Carbon::parse($request->date_depart);
        $end_date = Carbon::parse($request->date_retour);
        $nombre_jour = $end_date->diffInDays($start_date);
        $reservation->voyage()->update([
          "date_depart"=>$request->date_depart,
          "date_retour"=>$request->date_retour,
          "heure_lance"=>$request->heure_lance,
          "heure_retour"=>$request->heure_retour,
          "ville_destination"=>$request->ville_destination,
          "nombre_jour"=>$nombre_jour,
          "prix"=>$request->prix,
          "gens_voyage"=>$request->gens_voyage,
          "mode_paiement"=>$request->mode_paiement,
          "statut_payer"=>$request->statut_payer,
        ]);
        $reservation->agence()->update([
          "nom"=>$request->nom,
          "email"=>$request->email,
          "adresse"=>$request->adresse,
          "ville"=>$request->ville,
          "ice"=>$request->ice,
          "patente"=>$request->patente
        ]);
          return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        //
    }
    public function exporter(Reservation $reservation){
      $agence = Agence::all();
      $pdf = PDF::loadView('admin.reservations.pdf', compact('reservation'));
      return $pdf->stream();
    }
    // public function getVoyage(Request $request){
    //   $where = array('id' => $request->id);
    //   $data = DB::table('voyages')->where($where)->first();
    //   return response()->json($data);
    // }

    // public function getHotelCaracter(Request $request){
    //   // $data = HotelCaracteristique::where('hotel_id',$request->id)->get();
    //   $data = DB::table('caracteristiques')
    //   ->join('caracteristique_valeurs','caracteristiques.id','=','caracteristique_valeurs.caracteristique_id')
    //   ->join('hotel_caracteristiques','caracteristique_valeurs.id','=','hotel_caracteristiques.caracteristique_valeur_id')
    //   ->select("*")
    //   ->where('hotel_id','=',$request->id)
    //   ->get();

    //   return response()->json($data);
    // }

    // public function getHotelCaracterVal(Request $request){


    //   $data = DB::table('caracteristique_valeurs')
    //   ->join('hotel_caracteristiques','caracteristique_valeurs.id','=','hotel_caracteristiques.caracteristique_valeur_id')
    //   ->join('hotel_caracteristique','hotels.id','=','hotel_caracteristique.hotel_id')
    //   ->select("*")
    //   ->where('hotel_caracteristiques.hotel_id',$request->id)

    //   ->get();

    //   return response()->json($data);
    // }
}
