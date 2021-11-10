<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlbumController extends Controller
{
    public function getAlbum(Album $album, Review $review)
    {
       $avgRating = DB::table('reviews')
           ->select('rating')
           ->where('album_id', '=', $album->id)
           ->avg('rating');

//        $reviews = $album->reviews;



        return view('album',
        [
            'album' => $album,
            'avgRating' => number_format($avgRating, 1)
        ]);
    }
}