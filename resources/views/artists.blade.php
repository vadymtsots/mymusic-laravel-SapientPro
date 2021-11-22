<x-layout>

  <!--  <form action="" method="get">
        <label for="search">Search an artist</label>
        <input type="text" name="artist" value="{{-- request('artist') --}}">
    </form> -->

<div class="review">
    <p class="text">Artist: {{ $artist['artists']['items']['0']['name'] }} <br /></p>
    <p class="text">Popularity: {{ $artist['artists']['items']['0']['followers']['total'] }}</p>
</div>


<div class="review">
    @for($i = 0; $i < sizeof($artistAlbums); $i++)
        {{ $albumID = $artistAlbums[$i]['id']  }}

            <p>Album: <a href="{{ route('getSpotifyAlbum', $albumID) }}">{{ $artistAlbums[$i]['name'] . " "}} </a> Number of tracks: {{ $artistAlbums[$i]['total_tracks'] }};</p>


    @endfor
</div>

</x-layout>
