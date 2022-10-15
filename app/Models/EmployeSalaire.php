<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeSalaire extends Model
{
    use HasFactory;
    protected $table="employe_salaires";
    protected $fillable=["employe_id","salaire","jour","mois","annee","etat"];
    public function employe(){
      return $this->belongsTo(Employe::class,'employe_id');
    }
}
