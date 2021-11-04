

<x-layout>
    <form action="" class="registration_form" >
        <x-artist-field />
    </form>
    <form action="{{ route('reviewSubmit') }}" method="post" class="registration_form">
        <x-album-dropdown />

        <x-review-form />

    </form>

</x-layout>
