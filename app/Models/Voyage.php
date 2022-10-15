<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voyage extends Model
{
    use HasFactory;

    protected $table="voyages";
    protected $fillable=["transport_id","chauffeur_id","nom","date_depart","date_retour","heure_lance","heure_retour","ville_destination","prix","mode_paiement","statut_payer","nombre_jour","gens_voyage"];
    public function chauffeur(){
      return $this->belongsTo(Chauffeur::class,"chauffeur_id");
    }
    public function transport(){
      return $this->belongsTo(Transport::class,"chauffeur_id");
    }
    // public function hotel_caracter(){
    //   return $this->belongsTo(HotelCaracteristique::class,"chauffeur_id");
    // }
}
