<x-layout>

    @if($user->is_banned == 0)
    <h1>Are you sure you want to ban this user?</h1>

    <form action="{{ route('banUser', $user->id) }}" method="post">
        @csrf
        @method('post')
        <button>OK</button>
    </form>

    @else
        <h1>Are you sure you want to unban this user?</h1>

        <form action="{{ route('unBanUser', $user->id) }}" method="post">
            @csrf
            @method('post')
            <button>OK</button>
        </form>
    @endif

    <a href="{{ route('users') }}" class="button">Cancel</a>
</x-layout>
