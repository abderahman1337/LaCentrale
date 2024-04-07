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
