<h1 ><a class="title" href="{{ route('main') }}">MyMusic</a></h1>

<nav class="navbar">
    @if(Auth::check())


        <p>Logged in as: {{ Auth::user()->name }}</p>

            <form action="{{ route('logout') }}" method="post">
            @csrf
            <input type="submit" value="Logout" class="logout">
            </form>

    @else
    <ul>
        <li><a href="{{ route('loginForm') }}">Sign In</a></li>
        <li><a href="{{ route('registration') }}">Register</a></li>
    </ul>
    @endif






</nav>
