<a class="title" href="{{ route('main') }}"><h1>MyMusic</h1></a>

<nav class="navbar">
    @if(Auth::check())


        <p>Logged in as: {{ Auth::user()->name }}</p>

            <form action="{{ route('logout') }}" method="post">
            @csrf
            <input type="submit" value="Logout" class="logout">
            </form>

    <ul>
        <li><a href="{{ route('addReview') }}" class="add"><p>Add new review</p></a></li>
        <li><a href="{{ route('userReviews', ['id' => Auth::user()->id]) }}" class="add"><p>My reviews</p></a></li>

    </ul>

    @else
    <ul>
        <li><a href="{{ route('loginForm') }}">Sign In</a></li>
        <li><a href="{{ route('registration') }}">Register</a></li>
        <li><a href="{{ route('getArtists') }}">Artists</a></li>
    </ul>
    @endif






</nav>
