<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avion extends Model
{
    use HasFactory;
    protected $table="avions";
    protected $fillable=["numero","nom","capacite_total"];
    public function avion_classe(){
      return $this->hasMany(AvionClasse::class);
    }
}
