<x-layout>
    <div class="review">
        <h1 class="text">{{ $user->name}}</h1>
        <p class="text">Joined: {{ date('d-m-Y', strtotime($user->created_at)) }}</p>
        <p class="text">Reviews written: {{ $numberOfReviews }}</p>
        <p>Avatar: <img alt="avatar" class="text" src="{{ asset('storage/avatars/' . $user->avatar) }}"></p>
        <a href="{{ route('userReviews', $user) }}">See {{ $user->name }} reviews</a>
        @if(Auth::user()->id === $user->id)
            <a href="{{ route('editUser', $user) }}" class="button">Edit profile</a>
            <a href="{{ route('changePasswordForm', $user) }}" class="button">Change password</a>
        @endif
    </div>

</x-layout>
