<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artist;

class ArtistController extends Controller
{
    public function getArtists(Artist $artist)
    {
//            Artist::search(request(['artist']))->get();
        return view('artists', [
            'artists' => $artist->search(request(['search']))->simplePaginate(5)
        ]);
    }
}
