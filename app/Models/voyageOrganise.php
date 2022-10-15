<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class voyageOrganise extends Model
{
    use HasFactory;
    protected $table="voyage_organises";
    protected $fillable=["nom","image","reference","ville_destination","date_depart","date_retour","nombre_jour","prix","description"];
    public function voyage_caracteristique(){
      return $this->hasMany(VoyageCaracteristique::class);
    }
    public function voyage_programme(){
      return $this->hasMany(VoyageProgramme::class);
    }
    public function getRouteKeyName()
    {
      return "reference";
    }
}
