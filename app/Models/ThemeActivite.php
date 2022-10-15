<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThemeActivite extends Model
{
    use HasFactory;
    protected $table="theme_activites";
    protected $fillable=["activite_id","destination","depart","arrive","adulte","enfant","prix"];
    public function activite(){
      return $this->belongsTo(Activite::class,"activite_id");
    }
    // public function act(){
    //   return $this->belongsToMany(Activite::class,"activites","activite_id");
    // }
}
