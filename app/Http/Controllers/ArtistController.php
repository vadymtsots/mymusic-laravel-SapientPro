<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redis;
use Spotify;
use Illuminate\Http\Request;
use App\Models\Artist;
use PhpMyAdmin\Response;


class ArtistController extends Controller
{
    public function getArtists(Artist $artist)
    {

        $query = request()->input('artist');
        $artist = Spotify::searchArtists($query)->limit(1)->get();
        $artistID = $artist['artists']['items']['0']['id'];
        $artistAlbums = Spotify::artistAlbums($artistID)
            ->limit(30)
            ->includeGroups('album')
            ->country('GB')
            ->get();

        $artistAlbumsItems = $artistAlbums['items'];



        return view(
            'artists',
            [
             'artists' => $artist->artistSearch(request(['artist']))->simplePaginate(5),

              'artistAlbums' => $artistAlbumsItems,

            ]
        );
    }

    public function searchArtist(Artist $artist)
    {
        return view('new');
    }

    public function getArtist(Request $request)
    {
        $artist = Artist::search()->firstOrFail();
        $albums = $artist->albums;
        return response()->json(['id' => $artist->id, 'name' => $artist->name, 'albums' => $albums]);
    }
}
