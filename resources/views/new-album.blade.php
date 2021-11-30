<x-layout>
    <form action="{{ route('storeAlbumData') }}" method="post" class="registration_form">
        @csrf

        <label for="artist">Artist</label>
        <select name="artist" id="artist">
            @foreach($artists as $artist)
                <option value="{{ $artist->id }}">{{ $artist->name }}</option>
            @endforeach
        </select> <br />
        @error('artist')
        <div class="error"> {{ $message }} </div>
        @enderror

        <label for="name">Album name</label>
        <input type="text" name="name" id="name" placeholder="Album name"> <br />
        @error('name')
        <div class="error"> {{ $message }} </div>
        @enderror

        <label for="name">Release year</label>
        <input type="text" name="release_year" id="release_year" placeholder="Release year"> <br />
        @error('release_year')
        <div class="error"> {{ $message }} </div>
        @enderror

        <div class="checkbox-group">
        @foreach($genres as $genre)
            <label for="genres[]">{{ $genre->name }}</label>
            <input type="checkbox" name="genres[]" id="genres[]" placeholder="Genre" value="{{ $genre->id }}"> <br />
        @endforeach
        </div>


        <input type="submit" class="button" value="Add">

    </form>
</x-layout>
