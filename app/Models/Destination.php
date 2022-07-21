<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    use HasFactory;

    protected $fillable = [
        'destination_type_id', 'village_id', 'name', 'image', 'description', 'guide', 'price', 
    ];
}
