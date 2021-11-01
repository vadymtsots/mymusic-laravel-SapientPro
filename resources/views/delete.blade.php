@include('includes.head')
<body>

<header>
    @include('includes.header')
</header>

<section>

    <h1>Are you sure you want to delete the review?</h1>

    <form action="{{ route('deleteReview', $review->id) }}" method="post">
        @csrf
        @method('delete')
    <button class="button">OK</button>
    </form>
    <a href="{{ route('singleReview', $review) }}" class="button">Cancel</a>

</section>

<footer>
    @include('includes.footer')
</footer>



</body>
</html>
