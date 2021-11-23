<x-layout>

    <form action="{{ route('updatePassword') }}" method="post" class="registration_form">
        @csrf

        <input type="hidden" id="user_id" name="user_id" value="{{ $user->id }}">

        <label for="current_password">Your password</label>
        <input type="password" id="current_password" name="current_password">
        @error('current_password')
        <div class="error"> {{ $message }} </div>
        @enderror

        <label for="password">New password</label>
        <input type="password" id="password" name="password">
        @error('password')
        <div class="error"> {{ $message }} </div>
        @enderror

        <label for="password_confirmation">Confirm password</label>
        <input type="password" name="password_confirmation" id="password_confirmation"> <br />
        @error('password_confirmation')
        <div class="error"> {{ $message }} </div>
        @enderror

        <input type="submit" class="button">
    </form>

</x-layout>
