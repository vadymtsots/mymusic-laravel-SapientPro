@props(["artist"])

<form action="" class="registration_form" >

    <label for="artist">Artist</label>
    <input type="text" id="artist" name="artist" value="{{ request('artist') }}">
</form>

<p>Artist: {{ $artist->name }} <br />
Id: {{ $artist->id }}</p>


@error('artist')
<div class="error"> {{ $message }} </div>
@enderror



