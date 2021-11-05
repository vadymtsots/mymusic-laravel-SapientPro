<x-layout>
    <div class="card">
        <p><h1>{{ $album->name }}</h1></p> <br />
        <p> Released: {{ $album->release_year }} </p>
        <p> Rating: {{ $avgRating }}</p>



    </div>
</x-layout>
