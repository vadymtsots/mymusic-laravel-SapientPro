

    @csrf

    <label for="title">Review title (summary)</label>
    <input name="title" id="title">
    @error('title')
    <div class="error"> {{ $message }} </div>
    @enderror


    @error('albums')
    <div class="error"> {{ $message }} </div>
    @enderror
    <label for="review_body">Review</label>
    <textarea name="review_body" id="review_body" cols="30" rows="10"> </textarea>
    @error('review_body')
    <div class="error"> {{ $message }} </div>
    @enderror

    <label for="rating">Rating (out of 10)</label>
    <input type="text" name="rating" id="rating">
    @error('rating')
    <div class="error"> {{ $message }} </div>
    @enderror

    <input type="submit" name="submit" id="submit" class="button">

    <input type="hidden" id="user_id" name="user_id" value="{{ Auth::user()->id }}">
    <input type="hidden" id="artist_id" name="artist_id">




