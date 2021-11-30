<x-layout>

    @if($user->is_banned == 0)
    <h1>Are you sure you want to ban this user?</h1>

    <form action="{{ route('userAccess', $user->id) }}" method="post">
        @csrf

        <button>OK</button>
    </form>

    @else
        <h1>Are you sure you want to unban this user?</h1>

        <form action="{{ route('userAccess', $user->id) }}" method="post">
            @csrf

            <button>OK</button>
        </form>
    @endif

    <a href="{{ route('users') }}" class="button">Cancel</a>
</x-layout>
