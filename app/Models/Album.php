<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = ['artist_id', 'name', 'release_year'];


    public function artist()
    {
        return $this->belongsTo(Artist::class, 'artist_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }
}
