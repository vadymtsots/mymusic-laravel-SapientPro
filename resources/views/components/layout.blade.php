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

</body>
</html>
