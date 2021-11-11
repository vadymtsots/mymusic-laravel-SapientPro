<x-layout>


    @foreach($users as $user)
        <div class="review">
        <p class="text">Name: {{ $user->name }}</p>
        <p class="text">Email: {{ $user->email }}</p>
        <p class="text">Joined: {{ date('d-m-Y', strtotime($user->created_at)) }}</p>
        <p class="text">Reviews written: {{ $user->reviews->count() }}</p>
        </div>
    @endforeach

        <p class="pagination_links">{{ $users->links() }}</p>


</x-layout>
