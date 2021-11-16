<!doctype html>
<html lang="en">
@include('includes.head')
<body>

<header>
    @include('includes.header')
</header>

<section class="card">
    {{ $slot }}
</section>

<footer>
    @include('includes.footer')
</footer>

<script src="{{ asset('/js/fetchArtist.js') }}"></script>
<!-- <script src="{{ asset('/js/searchUsers.js') }}"></script> -->
</body>
</html>
