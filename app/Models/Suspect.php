<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suspect extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'age',
        'gender',
        'description',
        'address',
        'last_known_location',
        'status'
    ];
}