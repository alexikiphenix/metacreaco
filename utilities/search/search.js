let menuContainer;

window.addEventListener('click', () => {
    menuContainer.innerHTML = '';
});

window.addEventListener('DOMContentLoaded', () => {
    menuContainer = document.querySelector('#search-menu-container');

    menuContainer.addEventListener('click', (e) => {
        e.stopPropagation();
    });
    let ref;
    let searchInput = document.querySelector('#search-input');
    searchInput.addEventListener('input', (e) => {
        
//console.log
(e);
        
//console.log
(e.target.value);
        const value = e.target.value;
        if(ref) {
            clearTimeout(ref);
        }
        ref = setTimeout(() => {
            
//console.log
(value);
            axios.get('/users?search='+ value)
                .then( response => {
                    
//console.log
(response);
                    menuContainer.innerHTML = 
response.data
;
                })
                .catch( err => {
                    console.log(err);
                })
        }, 2000)
    });
});