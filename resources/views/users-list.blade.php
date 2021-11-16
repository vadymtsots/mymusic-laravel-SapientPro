
<x-layout>

    <form action="">
        <label for="user">Search</label>
        <input type="text" name="user" id="user">
        <button type="submit" id="searchUser"> Search</button>
    </form>
    @foreach($users as $user)
        <div class="review">
            <p class="text">Name: {{ $user->name }}</p>
            <p class="text">Email: {{ $user->email }}</p>
            <p class="text">Joined: {{ date('d-m-Y', strtotime($user->created_at)) }}</p>
            <p class="text">Reviews written: {{ $user->reviews->count() }}</p>

            @isset($banned)
                <a href="{{ route('banConfirmation', $user) }}" class="button">Unban user</a>
            @endisset
            @empty($banned)
                <a href="{{ route('banConfirmation', $user) }}" class="button">Ban user</a>
            @endempty




        </div>
    @endforeach
        <p class="pagination_links">{{ $users->links() }}</p>
        <a href="{{ route('bannedUsers') }}">Banned users</a>

</x-layout>
