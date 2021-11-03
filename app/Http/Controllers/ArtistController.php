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
            'artists' => $artist->artist(request(['artist']))->simplePaginate(5)
        ]);
    }

    public function searchArtist(Artist $artist)
    {
       return view('new',
           [
           'artist' => $artist->artist(request(['artist']))->get()
           ]);



    }
}
