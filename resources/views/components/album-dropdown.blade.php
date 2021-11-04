

<div>
    <label for="albums">Album</label>
    <select name="album_id" id="album_id">
        @foreach($albums as $album)
            <option value="{{ $album->id }}"> {{ $album->name }}</option>
        @endforeach

    </select>
</div>
