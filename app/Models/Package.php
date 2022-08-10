<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'thumbnail', 'description', 'day', 'night', 'price', 'lodging'];

    public function destinations()
    {
        return $this->hasMany(DestinationPackages::class)->with('destination');
    }

    public function transportations()
    {
        return $this->hasMany(PackageTransportation::class)->with('transportation');
    }

    public function hotel(){
        return $this->belongsTo(Hotel::class, 'hotel_id', 'id')->with('galleries');
    }
}
