@include('includes.head')
<body>

<header>
    @include('includes.header')
</header>

<section>



    <form action="/registration" method="post">
        @csrf
        <label for="name">Username</label>
        <input type="text" name="name" id="name" placeholder="Username"> <br />

        <label for="email">Email</label>
        <input type="text" name="email" id="email" placeholder="Email"> <br />

        <label for="password">Password</label>
        <input type="password" name="password" id="password" placeholder="Password"> <br />

        <label for="password_confirmation">Confirm password</label>
        <input type="password" name="password_confirmation" id="password_confirmation"> <br />

        <input type="submit" name="submit" id="submit">
    </form>

</section>

<footer>
    @include('includes.footer')
</footer>



</body>
</html>