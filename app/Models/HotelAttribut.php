<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HotelAttribut extends Model
{
    use HasFactory;
    protected $table="hotel_attributs";
    protected $fillable=["hotel_id","attribut_value_id","prix"];
    /**
     * Get the user that owns the HotelAttribut
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function hotel(): BelongsTo
    {
        return $this->belongsTo(Hotel::class, 'hotel_id', 'id');
    }

    public function att_val(): BelongsTo
    {
        return $this->belongsTo(AttributValue::class, 'attribut_value_id', 'id');
    }
}
