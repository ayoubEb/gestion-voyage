<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $table="contacts";
    protected $fillable=["prenom","nom","email","telephone","message","fichier","sujet"];
    public function getRouteKeyName()
    {
      return "email";
    }
}
