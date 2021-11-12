<x-layout>
    <h1>Are you sure you want to ban this user?</h1>

    <form action="{{ route('banUser', $user->id) }}" method="post">
        @csrf
        @method('post')
        <button>OK</button>
    </form>
    <a href="{{ route('users') }}" class="button">Cancel</a>
</x-layout>
