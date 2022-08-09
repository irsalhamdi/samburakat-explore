<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    protected $fillable = ['owner_id', 'name'];

    public function owner(){
        return $this->belongsTo(Owner::class, 'owner_id', 'id');
    }

    public function galleries(){
        return $this->hasMany(GalleryHotel::class, 'hotel_id', 'id');
    }
}
