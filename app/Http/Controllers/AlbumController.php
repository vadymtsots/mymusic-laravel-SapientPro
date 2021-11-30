<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\Genre;
use Spotify;
use App\Models\Album;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlbumController extends Controller
{
    public function getAlbum(Album $album)
    {
        $avgRating = DB::table('reviews')
            ->select('rating')
            ->where('album_id', '=', $album->id)
            ->avg('rating');

        return view(
            'album',
            [
                'album' => $album,
                'avgRating' => number_format($avgRating, 1),
                'reviews' => $album->reviews,
                'genres' => $album->genres
            ]
        );
    }

    public function getSpotifyAlbum(string $id)
    {
        $album = Spotify::album($id)->get();

        return view(
            'spotify-album',
            [
                'album' => $album
            ]
        );
    }

    public function addAlbumForm()
    {
        return view(
            'new-album',
                [
                    'artists' => Artist::all(),
                    'genres' => Genre::all()
                ]
        );
    }

    public function storeAlbumData(Request $request)
    {
        $album = new Album;
        $album->artist_id = $request->input('artist');
        $album->name = $request->input('name');
        $album->release_year = $request->input('release_year');
        $genreIds = $request->input('genres');
        $genres = Genre::find($genreIds);
        $album->save();
        $album->genres()->attach($genres);

        return redirect()->route('getAlbum', $album);
    }
}
