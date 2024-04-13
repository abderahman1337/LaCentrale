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


function hasScroll() {
    const bodyHasScroll = document.body.scrollHeight > window.innerHeight;
    const documentElementHasScroll = document.documentElement.scrollHeight > window.innerHeight;
    return bodyHasScroll || documentElementHasScroll;
 }
let isScrolled = false;
let lazyLoadingsImages = document.querySelectorAll('img[data-src]');
if(hasScroll()){
   document.addEventListener("DOMContentLoaded", function() {
    window.addEventListener('scroll', function (){
        let images = lazyLoadingsImages;
        if(images.length > 0){
           images.forEach(img => {
              if(img.dataset.src){
                  if (img.getBoundingClientRect().top < window.innerHeight && img.getBoundingClientRect().bottom >= 0) {
                     img.src = img.dataset.src;
                     img.removeAttribute('data-src');
                  }
              }
           });
           isScrolled = true;
        }
     });
   });

}else{
    window.addEventListener('DOMContentLoaded', function (){
        if(lazyLoadingsImages.length > 0){
            lazyLoadingsImages.forEach(img => {
               if(img.dataset.src){
                  if(!isScrolled){
                     img.src = img.dataset.src;
                     img.removeAttribute('data-src');
                  }
               }
            });
         }
    });
}
