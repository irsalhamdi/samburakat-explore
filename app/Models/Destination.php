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

    public function destinationtype(){
        return $this->belongsTo(DestinationType::class, 'destination_type_id', 'id');
    }

    public function village(){
        return $this->belongsTo(Village::class, 'village_id', 'id');
    }
}
