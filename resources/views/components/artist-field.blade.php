
<div>

    <label for="artist">Artist</label>
    <input type="text" id="artist" name="artist" value="{{ request('artist') }}">
    <p>Artist: {{ $artist->name }} <br />
    Id: {{ $artist->id }}</p>


    <div>
        <!-- here goes found artist -->
    </div>

</div>


