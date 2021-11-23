<x-layout>

    <form action="{{ route('updateUser', $user->id)  }}" method="post" enctype="multipart/form-data" class="registration_form">
        @csrf

        <input type="hidden" id="user_id" name="user_id" value="{{ $user->id }}">

        <label for="name">Name</label>
        <input type="text" id="name" name="name" value="{{ $user->name }}">
        @error('name')
        <div class="error"> {{ $message }} </div>
        @enderror

        <label for="email">Email</label>
        <input type="text" id="email" name="email" value="{{ $user->email }}">
        @error('email')
        <div class="error"> {{ $message }} </div>
        @enderror

        <p>Avatar:</p>
        <img src="{{ asset('storage/avatars/' . $user->avatar) }}" alt="Avatar">

        <label for="avatar">Avatar</label>
        <input type="file" name="avatar" id="avatar"> <br />
        @error('avatar')
        <div class="error"> {{ $message }} </div>
        @enderror

        <input type="submit" class="button">
    </form>

</x-layout>
