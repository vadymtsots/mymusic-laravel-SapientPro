
    <x-layout>
        @isset($reviews)
        @foreach ($reviews as $review)
            <x-card :review="$review" /> <br />
        @endforeach
        @endisset

        <p class="text">No reviews yet</p>

        <p class="pagination_links">{{ $reviews->links() }}</p>

    </x-layout>







