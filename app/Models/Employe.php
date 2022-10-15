<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Employe extends Model
{
    use HasFactory;
    protected $table="employes";
    protected $fillable=["image","cnie","name","adresse","ville","pays","nationalite","email","telephone","cv","genre","poste","travail"];
    public function getRouteKeyName()
    {
      return "cnie";
    }
    public function salaires(){
      return $this->hasMany(EmployeSalaire::class);
    }
    public function permi(){
      return $this->hasOne(Permis::class);
    }

}
