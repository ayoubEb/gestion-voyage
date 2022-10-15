<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activite extends Model
{
    use HasFactory;
    protected $table = "activites";
    protected $fillable=["theme"];
    public function theme_activite(){
      return $this->hasMany(ThemeActivite::class);
    }
}
