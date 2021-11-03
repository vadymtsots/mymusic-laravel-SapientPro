@props(["review"])

<div class="review">
    <p class="text">Artist: {{ $review->artist->name }}</p> <br />
    <p class="text">Album: {{ $review->album->name }}</p> <br />
    <p class="text">Review: {{ $review->review_body }}</p> <br />
    <p class="text">Rating: {{ number_format($review->rating, 1) }}</p> <br />
    <p class="text">User: {{ $review->user->name }}</p> <br />

    @if(Auth::check())
        <a href="{{ route('singleReview', $review) }}">Go to review</a>
    @endif
</div>
