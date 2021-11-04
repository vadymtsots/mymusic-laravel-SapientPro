<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;
    public $timestamps = false;



    public function artist()
    {
        return $this->belongsTo(Artist::class, 'artist_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
