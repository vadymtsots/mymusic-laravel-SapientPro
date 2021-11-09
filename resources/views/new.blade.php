

<x-layout>

    <form action="{{ route('reviewSubmit') }}" method="post" class="registration_form">

        <x-artist-field />

        <x-album-dropdown />

        <x-review-form />

    </form>

</x-layout>
