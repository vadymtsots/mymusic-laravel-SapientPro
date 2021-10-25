<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function albums()
    {
        return $this->hasMany(Album::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

}
