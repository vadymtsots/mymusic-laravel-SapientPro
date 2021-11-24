<x-layout>
    <form action="{{ route('password.email') }}" method="post" class="registration_form">
        @csrf
        <label for="name">Enter your email</label>
        <input type="text" name="email" id="email" placeholder="Email"> <br />
        @error('email')
        <div class="error"> {{ $message }} </div>
        @enderror
        <input type="submit" class="button" value="Send reset link">

    </form>
</x-layout>
