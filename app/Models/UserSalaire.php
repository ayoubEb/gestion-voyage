<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSalaire extends Model
{
    use HasFactory;
    protected $table="user_salaires";
    protected $fillable=["user_id","salaire","jour","mois","annee","etat"];
    public function user(){
      return $this->belongsTo(User::class,"user_id");
    }
}
