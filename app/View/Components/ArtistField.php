<?php

namespace App\View\Components;

use App\Models\Artist;
use Illuminate\View\Component;

class ArtistField extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $artist = Artist::searchArtist()->firstOrFail();
        return view('components.artist-field',
        [
            'artist' => $artist
        ]);
    }
}
