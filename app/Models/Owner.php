<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    use HasFactory;

    protected $fillable = ['village_id', 'name', 'phone_number'];

    public function village(){
        return $this->belongsTo(Village::class, 'village_id', 'id');
    }
}
