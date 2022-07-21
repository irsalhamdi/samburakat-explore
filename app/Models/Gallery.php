<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = ['destination_id', 'image'];

    public function destination(){
        return $this->belongsTo(Destination::class, 'destination_id', 'id');
    }
}
