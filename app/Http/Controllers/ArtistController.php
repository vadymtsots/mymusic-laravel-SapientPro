<?php

namespace App\Http\Controllers;

use Spotify;
use Illuminate\Http\Request;
use App\Models\Artist;
use PhpMyAdmin\Response;


class ArtistController extends Controller
{
    public function getArtists(Artist $artist)
    {
        $query = request()->input('artist');
//            Artist::search(request(['artist']))->get();
        return view(
            'artists',
            [
//              'artists' => $artist->artistSearch(request(['artist']))->simplePaginate(5)
                'artist' => Spotify::searchArtists($query)->get()

            ]
        );
    }

    public function searchArtist(Artist $artist)
    {
        return view('new');
    }

    public function getArtist(Request $request)
    {
        $artist = Artist::searchArtist()->firstOrFail();
        $albums = $artist->albums;
        return response()->json(['id' => $artist->id, 'name' => $artist->name, 'albums' => $albums]);
    }
}
