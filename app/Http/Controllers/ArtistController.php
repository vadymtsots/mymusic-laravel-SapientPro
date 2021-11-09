<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artist;
use PhpMyAdmin\Response;

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
       return view('new');

    }

    public function getArtist(Request $request)
    {
        $artist = Artist::artist()->firstOrFail();
        $albums = $artist->albums;
        return response()->json(['id' => $artist->id ,'name' => $artist->name, 'albums' => $albums]);
    }
}
