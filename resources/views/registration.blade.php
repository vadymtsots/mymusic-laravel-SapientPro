@include('includes.head')
<body>

<header>
    @include('includes.header')
</header>

<section>



    <form action="{{ route('registrationSubmit') }}" method="post" class="registration_form" enctype="multipart/form-data">
        @csrf
        <label for="name">Username</label>
        <input type="text" name="name" id="name" placeholder="Username"> <br />
        @error('name')
        <div class="error"> {{ $message }} </div>
        @enderror

        <label for="email">Email</label>
        <input type="text" name="email" id="email" placeholder="Email"> <br />
        @error('email')
        <div class="error"> {{ $message }} </div>
        @enderror

        <label for="avatar">Avatar</label>
        <input type="file" name="avatar" id="avatar"> <br />
        @error('avatar')
        <div class="error"> {{ $message }} </div>
        @enderror

        <label for="password">Password</label>
        <input type="password" name="password" id="password" placeholder="Password"> <br />
        @error('password')
        <div class="error"> {{ $message }} </div>
        @enderror

        <label for="password_confirmation">Confirm password</label>
        <input type="password" name="password_confirmation" id="password_confirmation"> <br />
        @error('password_confirmation')
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
