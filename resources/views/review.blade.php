<x-layout>
        <div class="review">
            <p class="text">Artist: {{ $review->artist->name }}</p> <br />
            <p class="text">Album: {{ $review->album->name }}</p> <br />
            <p class="text">Review: {{ $review->review_body }}</p> <br />
            <p class="text">Rating: {{ number_format($review->rating, 1) }}</p> <br />
            <p class="text">User: {{ $review->user->name }}</p> <br />

            @if($review->user->id === Auth::user()->id)
            <ul>
                <li><a href="{{ route('editForm', $review) }}">Edit</a></li>
                <li><a href="{{ route('deleteConfirmation', $review) }}">Delete</a></li>
            </ul>
            @elseif(Auth::user()->is_admin)
            <ul>
                <li><a href="{{ route('deleteConfirmation', $review) }}">Delete</a></li>
            </ul>
            @endif
        </div>
</x-layout>
