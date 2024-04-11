const CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').content;
function listFilterByName(searchInput, itemList){
    searchInput.addEventListener('input', function() {
        const searchText = searchInput.value.toLowerCase(); 
        Array.from(itemList.getElementsByTagName('li')).forEach(function(item) {
            const itemName = item.getAttribute('data-name').toLowerCase(); 
            if (itemName.includes(searchText)) {
                item.style.display = 'block'; 
            } else {
                item.style.display = 'none';
            }
        });
    });
}


let dropdownContainers = document.querySelectorAll('.dropdown-container');
dropdownContainers.forEach(container => {
   let button = container.querySelector('.button');
   let dropdown = container.querySelector('.dropdown');
   button.addEventListener('click', function (){
        dropdown.classList.toggle('active');
   });
});



let favoriteBtns = document.querySelectorAll('.favorite-btn');
favoriteBtns.forEach(function (btn){
    btn.addEventListener('click', () => {
        btn.classList.toggle('active');
        let vehicule = btn.dataset.vehicule;
        var xhr = new XMLHttpRequest();
        xhr.open('POST', '/favorite', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.setRequestHeader('X-CSRF-TOKEN', CSRF_TOKEN);
        xhr.onreadystatechange = function (){
            if (this.readyState == 4 && this.status == 200) {
                
            }
        }
        xhr.send('vehicule='+vehicule);
    });
});