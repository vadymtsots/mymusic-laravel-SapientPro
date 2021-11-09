<?php

namespace App\View\Components;

use App\Models\Album;
use App\Models\Artist;
use Illuminate\View\Component;

class AlbumDropdown extends Component
{

    /**
     * Create a new component instance.
     *
     * t
     */
    public function __construct()
    {

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $artist = Artist::artist()->firstOrFail();
        return view('components.album-dropdown',
        [
           'albums' => $artist->albums->load('artist')

        ]);
    }
}
