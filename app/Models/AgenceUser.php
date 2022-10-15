<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgenceUser extends Model
{
    use HasFactory;
    protected $table="agence_users";
    protected $fillable=["agence_id","user_id"];
    public function user(){
      return $this->belongsTo(User::class,'user_id');
    }
    public function agence(){
      return $this->belongsTo(Agence::class,'agence_id');
    }
}
