@include('includes.head')
<body>

<header>

    @include('includes.header')
</header>

<section class="card">

    <form action="{{ route('editSubmit', $review->id) }}" method="post">
        @csrf

        <input type="hidden" id="user_id" name="user_id" value="{{ Auth::user()->id }}">

        <label for="artist_id">Artist</label>
        <input type="text" id="artist_id" name="artist_id" value="{{ $review->artist_id }}">
        @error('artist_id')
        <div class="error"> {{ $message }} </div>
        @enderror


        <label for="album_id">Album</label>
        <input type="text" id="album_id" name="album_id" value="{{ $review->album_id }}">
        @error('album_id')
        <div class="error"> {{ $message }} </div>
        @enderror

        <label for="review_body">Review</label>
        <textarea name="review_body" id="review_body" cols="30" rows="10" > {{ $review->review_body }}</textarea>
        @error('review_body')
        <div class="error"> {{ $message }} </div>
        @enderror

        <label for="rating">Rating</label>
        <input type="text" name="rating" id="rating" value="{{ number_format($review->rating, 1) }}">
        @error('rating')
        <div class="error"> {{ $message }} </div>
        @enderror


        <input type="submit" class="button">



    </form>

</section>

<footer>
    @include('includes.footer')
</footer>



</body>
</html>
