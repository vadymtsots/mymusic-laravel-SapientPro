<?php

namespace App\View\Components;

use App\Models\Artist;
use Illuminate\View\Component;

class ReviewForm extends Component
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
        return view('components.review-form',
        [
            'artist' => Artist::search()->firstOrFail()
        ]);
    }
}
