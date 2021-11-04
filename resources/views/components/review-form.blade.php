

    @csrf


    <label for="albums">Album</label>
    <select name="album_id" id="album_id">
        @foreach($albums as $album)
            <option value="{{ $album->id }}"> {{ $album->name }}</option>
        @endforeach

    </select>
    @error('albums')
    <div class="error"> {{ $message }} </div>
    @enderror
    <label for="review_body">Review</label>
    <textarea name="review_body" id="review_body" cols="30" rows="10"> </textarea>
    @error('review_body')
    <div class="error"> {{ $message }} </div>
    @enderror

    <label for="rating">Rating</label>
    <input type="text" name="rating" id="rating">
    @error('rating')
    <div class="error"> {{ $message }} </div>
    @enderror

    <input type="submit" name="submit" id="submit" class="button">

    <input type="hidden" id="user_id" name="user_id" value="{{ Auth::user()->id }}">
    <input type="hidden" id="artist_id" name="artist_id" value="{{ $artist->id }}">
    <!-- <input type="hidden" id="album_id" name="album_id" value="{{-- $album->id --}}"> -->


