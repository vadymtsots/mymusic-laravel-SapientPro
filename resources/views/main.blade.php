
    <x-layout>
        @foreach ($reviews as $review)
            <x-card :review="$review" />
        @endforeach
        <p class="pagination_links">{{ $reviews->links() }}</p>

    </x-layout>







