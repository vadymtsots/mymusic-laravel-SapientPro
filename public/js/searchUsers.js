let btnUser = document.getElementById('searchUser');


function searchUser(e)
{
    const field = document.getElementById('user').value;
    const url = `/users/search/${field}`;



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
        .then(users => {
            field.setAttribute('value', user.name);
        })
}
btnUser.addEventListener("click", (e)=> {
    searchUser(e);
});
