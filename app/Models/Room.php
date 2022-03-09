<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $fillable = [
        'number_name',
        'apartement_id'
    ];
    public function apartement(){
        return $this->belongsTo(Apartement::class);
    }
    public function temperatures(){
        return $this->hasMany(Temperature::class);
    }
    public function tempFiltre(){
        return $this->hasMany(Temperature::class);
    }
    public function temperature(){
        return $this->hasOne(Temperature::class);
    }
   
}
