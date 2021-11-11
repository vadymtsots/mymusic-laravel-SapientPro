<a class="title" href="{{ route('main') }}"><h1>MyMusic</h1></a>

<nav class="navbar">
    @if(Auth::check())

        <p>Logged in as: {{ Auth::user()->name }}</p>

            <form action="{{ route('logout') }}" method="post">
            @csrf
            <input type="submit" value="Logout" class="logout">
            </form>

    <div class="links">
        <ul>
            <li><a href="{{ route('addReview') }}" class="add">Add new review</a></li>
            <li><a href="{{ route('userReviews', ['id' => Auth::user()->id]) }}" class="add">My reviews</a></li>
            @if(Auth::user()->is_admin)
                <li><a href="{{ route('users') }}">Users</a></li>
            @endif
        </ul>
    </div>

    @else
    <ul>
        <li><a href="{{ route('loginForm') }}">Sign In</a></li>
        <li><a href="{{ route('registration') }}">Register</a></li>
        <li><a href="{{ route('getArtists') }}">Artists</a></li>
    </ul>
    @endif






</nav>
