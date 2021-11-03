<x-layout>

    <form action="" method="get">
        <label for="search">Search an artist</label>
        <input type="text" name="artist" value="{{ request('artist') }}">
    </form>

    @foreach($artists as $artist)
        <x-artist-card :artist="$artist" />
    @endforeach

    <p>{{ $artists->links() }}</p>

</x-layout>
