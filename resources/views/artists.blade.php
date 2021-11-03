<x-layout>

    <form action="" method="get">
        <label for="search">Search an artist</label>
        <input type="text" name="search" value="{{ request('search') }}">
    </form>

    @foreach($artists as $artist)
        <x-artist-card :artist="$artist" />
    @endforeach

    <p>{{ $artists->links() }}</p>

</x-layout>
