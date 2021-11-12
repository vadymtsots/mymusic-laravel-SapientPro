@props(["review", "user"])

<div class="review">
    <h1 class="text">{{ $review->artist->name . " - "}} <a href="{{ route('getAlbum', $review->album) }}">{{$review->album->name }}</a></h1> <br/>
    <h3 class="text">{{ $review->title }}</h3> <br/>
    <p class="text">Rating: {{ $review->rating }}</p> <br/>
    <p class="text">Written by: <a href="{{ route('getUser', $review->user)  }}">{{ $review->user->name }}</a></p> <br/>

    <a href="{{ route('getAlbum', $review->album) }}">Go to album</a>
    <a href="{{ route('singleReview', $review) }}">Go to review</a>

</div>
