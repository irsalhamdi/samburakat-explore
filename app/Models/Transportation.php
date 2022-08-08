<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transportation extends Model
{
    use HasFactory;

    protected $fillable = [
        'owner_id', 'name', 'image',
    ];

    public function owner(){
        return $this->belongsTo(Owner::class, 'owner_id', 'id');
    }
}
