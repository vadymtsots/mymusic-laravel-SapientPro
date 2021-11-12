<x-layout>

    <form action="{{ route('editSubmit', $review->id) }}" method="post">
        @csrf

        <input type="hidden" id="user_id" name="user_id" value="{{ $review->user->id }}">

        <label for="artist">Artist</label>
        <input type="text" id="artist" name="artist" value="{{ $review->artist->name }}" disabled>
        @error('artist')
        <div class="error"> {{ $message }} </div>
        @enderror


        <label for="album">Album</label>
        <input type="text" id="album" name="album" value="{{ $review->album->name }}" disabled>
        @error('album')
        <div class="error"> {{ $message }} </div>
        @enderror

        <label for="review_body">Review</label>
        <textarea name="review_body" id="review_body" cols="30" rows="10" > {{ $review->review_body }}</textarea>
        @error('review_body')
        <div class="error"> {{ $message }} </div>
        @enderror

        <label for="rating">Rating</label>
        <input type="text" name="rating" id="rating" value="{{ $review->rating }}">
        @error('rating')
        <div class="error"> {{ $message }} </div>
        @enderror

        <label for="title">Title</label>
        <input type="text" name="title" id="title" value="{{ $review->title }}">
        @error('title')
        <div class="error"> {{ $message }} </div>
        @enderror

        <input type="hidden" id="artist_id" name="artist_id" value="{{ $review->artist->id }}">
        <input type="hidden" id="album_id" name="album_id" value="{{ $review->album->id }}">
        <input type="submit" class="button">
    </form>

</x-layout>
