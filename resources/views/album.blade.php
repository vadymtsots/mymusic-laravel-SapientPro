<x-layout>
    <div class="review">
        <p><h1>{{ $album->name }}</h1></p> <br />
        <p> Released: {{ $album->release_year }} </p>
        <p> Average rating: {{ $avgRating }}</p>

        <h2>Reviews: </h2>
        @foreach($reviews as $review)
            <div class="album-reviews">
                <h3 class="text">{{ $review->title }}</h3>
                <p class="text">Rating: {{ $review->rating }}</p>
                <a href="{{ route('singleReview', $review) }}"><p class="text">Go to review</p></a>
            </div>
        @endforeach
    </div>


</x-layout>
