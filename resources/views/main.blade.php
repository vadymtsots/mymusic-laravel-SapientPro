
@include('includes.head')
<body>

<header>
@include('includes.header')
</header>

<section>

    @foreach ($reviews as $review)

    <p>Review: {{ $review->review_body }}</p> <br />
    <p>Rating: {{ $review->rating }}</p> <br />
    <p>User: {{ $review->user->name }}</p> <br />
    <p>Artist: {{ $review->artist->name }}</p> <br />
    <p>Album: {{ $review->album->name }}</p> <br />

    @endforeach


    <a href="#">Create new review</a>
</section>

<footer>
    @include('includes.footer')
</footer>



</body>
</html>
