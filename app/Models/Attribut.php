<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
class Attribut extends Model
{
    use HasFactory;
    protected $table="attributs";
    protected $fillable=["nom"];

    /**
     * Get all of the comments for the Attribut
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function values(): HasMany
    {
        return $this->hasMany(AttributValue::class, 'attribut_id', 'id');
    }

    /**
     * Get the user associated with the Attribut
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function value(): HasOne
    {
        return $this->hasOne(AttributValue::class, 'attribut_id', 'id');
    }
}
