
<div>

    <label for="artist">Artist</label>
    <input type="text" id="artist" name="artist" value="{{ request('artist') }}">
    <button type="button" id="getArtist"> Search </button>
    <script>
        let btnArtist = document.getElementById('getArtist');
        const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;

        function getArtist(e)
        {
            const field = document.getElementById('artist').value;
            const url = `/new/${field}`;
            e.preventDefault();
            fetch(url,
                {
                    method: 'get',
                    headers : {
                        'Accept': 'application/json',

                    },

                })
                .then(response => {
                    return response.json();
                })
                .then(artist => {
                    console.log(artist);
                })
        }

        btnArtist.addEventListener("click", (e)=> {
            getArtist(e);
        });
    </script>





    <div>
        <!-- here goes found artist -->
    </div>

</div>


