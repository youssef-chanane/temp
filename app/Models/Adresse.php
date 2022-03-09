<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adresse extends Model
{
    use HasFactory;
    protected $fillable = [
        'company',
        'adress',
        'poste',
        'state',
        'tel',
        'tel1',
        'logitude',
        'latitude',
        'ipBox',
        'apartement_id'
    ];
    public function apartement(){
        return $this->belongsTo(Apartement::class);
    }
}
