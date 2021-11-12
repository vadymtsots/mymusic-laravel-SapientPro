<x-layout>
        <div class="review">
            <h1 class="text">{{ $review->artist->name . " - "}} <a href="{{ route('getAlbum', $review->album) }}">{{$review->album->name }}</a></h1> <br/>
            <h3 class="text">{{ $review->title }}</h3> <br/>
            <p class="text">{{ $review->review_body }}</p> <br />
            <p class="text">Rating: {{ $review->rating }}</p> <br />
            <p class="text">Written by: <a href="{{ route('getUser', $review->user)  }}">{{ $review->user->name }}</a></p> <br/>

            @if(Auth::guest())
                <a href="{{ route('main') }}">Back to reviews</a>
            @elseif($review->user->id === Auth::user()->id || Auth::user()->is_admin)
            <ul>
                <li><a href="{{ route('editForm', $review) }}">Edit</a></li>
                <li><a href="{{ route('deleteConfirmation', $review) }}">Delete</a></li>
            </ul>
           @endif
        </div>
</x-layout>
