<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $table='reservations';
    protected $fillable=['client_id','voyage_id','agnce_id','num_reservation','mode_paiement','statut_payer',"valid_reservation"];
    public function client(){
      return $this->belongsTo(Client::class,'client_id');
    }
    public function voyage(){
      return $this->belongsTo(Voyage::class,'voyage_id');
    }
    public function agence(){
      return $this->belongsTo(Agence::class,'agence_id');
    }
}
