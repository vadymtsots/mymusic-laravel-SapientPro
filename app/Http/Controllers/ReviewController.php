<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Artist;
use App\Models\User;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function getAllReviews()
    {
        return view('main',
        [
            'reviews' => Review::with("user", "artist", "album")->get()
        ]);
    }
}
