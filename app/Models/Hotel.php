<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Hotel extends Model
{
    use HasFactory;
    protected $table="hotels";
    protected $fillable=["nom_h","adresse_h","ville_h","email_h","cp_h","telephone_h"];
    public function attribut_values(): HasMany
    {
        return $this->hasMany(HotelAttribut::class, 'attribut_value_id', 'id');
    }
}
