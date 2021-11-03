

<x-layout>
        <x-artist-field :artist="$artist"/>

    <form action="{{ route('reviewSubmit') }}" method="post" class="registration_form">
        <x-review-form :artist="$artist"/>
    </form>

</x-layout>
