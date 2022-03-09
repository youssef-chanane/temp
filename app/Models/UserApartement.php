<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserApartement extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'apartement_id'

    ];}
