<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageTransportation extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function transportation()
    {
        return $this->belongsTo(Transportation::class, 'transportation_id', 'id');
    }

    public function package()
    {
        return $this->belongsTo(Package::class, 'package_id', 'id');
    }
}
