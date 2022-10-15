<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AttributValue extends Model
{
    use HasFactory;
    protected $table="attribut_values";
    protected $fillable=["attribut_id","valeur"];

    public function attribut(): BelongsTo
    {
        return $this->belongsTo(Attribut::class, 'attribut_id', 'id');
    }
}
