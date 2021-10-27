
@include('includes.head')
<body>

<header>
@include('includes.header')
</header>

<section class="card">



        @foreach ($reviews as $review)


        <div class="review">
            <p class="text">Artist: {{ $review->artist->name }}</p> <br />
            <p class="text">Album: {{ $review->album->name }}</p> <br />
            <p class="text">Review: {{ $review->review_body }}</p> <br />
            <p class="text">Rating: {{ $review->rating }}</p> <br />
            <p class="text">User: {{ $review->user->name }}</p> <br />

        </div>


        @endforeach





</section>

<footer>
    @include('includes.footer')
</footer>



</body>
</html>
