let btnArtist = document.getElementById('getArtist');
let select = document.getElementById('album_id')

function getArtist(e)
{
    const field = document.getElementById('artist').value;
    const url = `/new/${field}`;
    const artistId = document.getElementById('artist_id');



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

            const {albums} = artist;
            albums.map((item) => {
                let option = document.createElement('option');
                let optionText = document.createTextNode(item.name)
                option.appendChild(optionText);
                option.setAttribute('value', item.id);
                select.appendChild(option);
                //option.value = item.id;
            })
            artistId.setAttribute('value', artist.id);
        })
}



btnArtist.addEventListener("click", (e)=> {
    getArtist(e);
});
