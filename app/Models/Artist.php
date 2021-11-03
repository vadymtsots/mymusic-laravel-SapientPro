<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    use HasFactory;

    protected $primaryKey = "id";

    protected $fillable = ['name'];

    public $timestamps = false;

    public function albums()
    {
        return $this->hasMany(Album::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    /**
     * @param $query
     * @param array $filters
     */
    public function scopeArtist($query, array $filters)
    {
        if($filters['artist'] ?? false){
            $query->
                where('name', 'like', '%' . request('artist') . '%');
        }
    }

}
