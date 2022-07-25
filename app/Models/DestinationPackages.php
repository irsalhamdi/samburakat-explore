<?php

namespace App\Models;

use Facade\Ignition\Support\Packagist\Package;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DestinationPackages extends Model
{
    use HasFactory;

    protected $fillable = ['destination_id', 'package_id'];

    public function destination(){
        return $this->belongsTo(Destination::class, 'destination_id', 'id');
    }

    public function package(){
        return $this->belongsTo(Packages::class, 'package_id', 'id');
    }
}
