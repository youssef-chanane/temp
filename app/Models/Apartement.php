<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartement extends Model
{
    use HasFactory;

    protected $fillable = [
        'apartementName'
    ];
    // public function temperatures()
    // {
    //     return $this->hasManyThrough( Temperature::class,Room::class);
    // }
    public function users(){
        return $this->belongsToMany(User::class,'user_apartements');
    }
    public function rooms(){
        return $this->hasMany(Room::class);
    }
    public function adresse(){
        return $this->hasOne(Adresse::class);
    }
}
