@include('includes.head')
<body>

<header>
    @include('includes.header')
</header>

<section>



    <form action="{{ route('auth') }}" method="post" class="registration_form">
        @csrf
        <label for="name">Email</label>
        <input type="text" name="email" id="email" placeholder="email"> <br />
        @error('email')
        <div class="error"> {{ $message }} </div>
        @enderror


        <label for="password">Password</label>
        <input type="password" name="password" id="password" placeholder="Password"> <br />
        @error('password')
        <div class="error"> {{ $message }} </div>
        @enderror

        <input type="submit" name="submit" id="submit" class="button">
    </form>

</section>

<footer>
    @include('includes.footer')
</footer>



</body>
</html>
