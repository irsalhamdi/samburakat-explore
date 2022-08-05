<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function destinations()
    {
        return $this->hasMany(DestinationPackages::class);
    }

    public function transportations()
    {
        return $this->hasMany(PackageTransportation::class);
    }
}
