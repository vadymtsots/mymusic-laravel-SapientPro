<x-layout>

  <!--  <form action="" method="get">
        <label for="search">Search an artist</label>
        <input type="text" name="artist" value="{{-- request('artist') --}}">
    </form> -->

<div class="review">
    <p class="text">Artist: {{ $artist['artists']['items']['0']['name'] }} <br /></p>
    <p class="text">Popularity: {{ $artist['artists']['items']['0']['followers']['total'] }}</p>
</div>

</x-layout>
