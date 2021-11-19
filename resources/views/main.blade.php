
    <x-layout>

        @if($reviews->count())
        @foreach ($reviews as $review)
            <x-card :review="$review" /> <br />
        @endforeach

            <p class="pagination_links">{{ $reviews->links() }}</p>

        @else
        <p class="text">No reviews yet</p>
        @endif



    </x-layout>







