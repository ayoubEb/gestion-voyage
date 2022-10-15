<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transport extends Model
{
    use HasFactory;
    protected $table="transports";
    protected $fillable=['employe_id',"matricule","boite","capacite","vitesse","etat","statut"];
  public function employe(){
    return $this->belongsTo(Employe::class,"employe_id");
  }
}
