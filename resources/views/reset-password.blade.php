<x-layout>

    <form action="{{ route('password.update') }}" method="post" class="registration_form">
        @csrf
        <label for="name">Enter your email</label>
        <input type="text" name="email" id="email" placeholder="Email"> <br />
        @error('email')
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

        <input type="hidden" id="token" name="token" value="{{ $token }}">
        <input type="submit" class="button" value="Reset password">

    </form>
</x-layout>
