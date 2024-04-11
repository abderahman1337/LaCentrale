@extends('layouts.admin')
@section('title', 'Modifier le menu')
@section('content')
<div id="edit-menu-page" class="pb-20">
   <h2 class="font-semibold text-[22px] mb-6">Modifier le menu</h2>
   <form class="menu-form" id="edit-menu-form" action="{{route('admin.menus.update', $menu->id)}}" method="post">
      @csrf
      @method('PUT')
      <div class="bg-white dark:border-gray-300 dark:border-opacity-10 dark:bg-darkSurface rounded-md shadow-sm border-[#e5e5e5] border">
         <div class="p-[20px] border-b dark:border-gray-300 dark:border-opacity-10">
            <div>
               <h1 class="font-semibold text-[16px]">Donnez un nom à cette liste de liens</h1>
            </div>
        </div>
        <div class="p-[20px]">
            <div class="">
               <div class="relative">
                  <input type="text" name="menu_name" id="menu-name" value="{{old('menu_name', $menu->name)}}" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                  <label for="menu-name" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Nom</label>
              </div>
              @error('menu_name')
                  <div class="error-msg">{{$message}}</div>
              @enderror
            </div>
         </div>
      </div>

      <div class="bg-white dark:border-gray-300 dark:border-opacity-10 dark:bg-darkSurface rounded-md shadow-sm border-[#e5e5e5] border mt-4">
         <div class="p-[20px] border-b dark:border-gray-300 dark:border-opacity-10">
            <div>
               <h1 class="font-semibold text-[16px]">Faites glisser les liens pour modifier l'ordre dans lequel ils apparaissent dans la police de votre site Web</h1>
            </div>
        </div>
        <div class="p-[20px]">
            <template id="menu-item-template">
               <div class="bg-[#fcfcfc] dark:bg-darkBg dark:border-gray-300 dark:border-opacity-10 rounded-md shadow-sm border-[#e5e5e5] border menu-item-box">
                  <div class="px-[20px] py-[15px]">
                     <div class="flex items-start flex-col lg:flex-row gap-4 w-full">
                        <div class="w-full">
                           <div class="relative">
                              <input type="text" class="menu-item-name block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                              <label class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Nom</label>
                          </div>
                        </div>
                        <div class="w-full">
                           <div class="relative">
                              <input type="text" class="menu-item-link block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                              <label class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Lien</label>
                          </div>
                        </div>
                        <div class="w-full">
                           <button class="bg-red-500 py-3.5 px-5 text-sm rounded-lg text-white delete-item" type="button">Supprimer</button>
                        </div>
                     </div>
                  </div>
               </div>
            </template>
            <div class="grid grid-cols-1 gap-4 w-full">
               <div class="menu-items-box flex flex-col gap-2">
                  @foreach ($menu->items as $key => $menuItem)
                  <div class="bg-[#fcfcfc] dark:bg-darkBg dark:border-gray-300 dark:border-opacity-10 rounded-md cursor-move shadow-sm border-[#e5e5e5] border menu-item-box" data-id="{{$menuItem->id}}" id="menu-item-{{$key+1}}">
                     <div class="px-[20px] py-[15px]">
                        <div class="flex items-center flex-col lg:flex-row gap-4 w-full">
                           <div class="w-full">
                              <div class="relative">
                                 <input type="text" name="menu_items[{{$key}}][name]" id="menu-item-name-{{$key+1}}" value="{{old('menu_items.'.$key.'.name', $menuItem->name)}}" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                 <label for="menu-item-name-{{$key+1}}" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Nom</label>
                             </div>
                             @error('menu_items.*.name')
                                 <div class="error-msg">{{$message}}</div>
                             @enderror
                           </div>
                           <div class="w-full">
                              <div class="relative">
                                 <input type="text" name="menu_items[{{$key}}][link]" id="menu-item-link-{{$key+1}}" value="{{old('menu_items.'.$key.'.link', $menuItem->url)}}" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                 <label for="menu-item-link-{{$key+1}}" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Lien</label>
                             </div>
                             @error('menu_items.*.link')
                                 <div class="error-msg">{{$message}}</div>
                             @enderror
                           </div>
                           <div class="w-full">
                              <button onclick="document.getElementById('menu-item-{{$key+1}}').remove()" id="delete-menu-item-{{$key+1}}" class="bg-red-500 lg:py-3.5 py-2.5 px-5 text-sm rounded-lg text-white delete-item" type="button">Supprimer</button>
                           </div>
                        </div>
                     </div>
                  </div>
                  @endforeach
               </div>
               <button id="add-menu-item" class="bg-blue-600 w-max py-3 px-5 text-sm rounded-lg text-primaryText" type="button">Ajouter</button>
            </div>
         </div>
      </div>
      
      <button class="bg-primary text-primaryText py-2.5 px-5 rounded-lg font-medium mt-4 flex items-center gap-2.5" type="submit">
         <span>Sauvgarder</span>
      </button>
   </form>
</div>
@endsection
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
<script>
   var menuItemsList = document.querySelector('.menu-items-box');
   new Sortable(menuItemsList,{
      animation:350,
   });
   menuItemsList.addEventListener('change', function (event){
      if(event.originalEvent && event.originalEvent.type == 'dragenter'){
         var items = menuItemsList.querySelectorAll('.menu-item-box');
         var arrangment = [];
         items.forEach(item => {
            arrangment.push(item.dataset.id);
         });
         var xhr = new XMLHttpRequest();
         xhr.open('POST', route('admin.menu.items.order.update'), true);
         xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
         xhr.setRequestHeader('X-CSRF-TOKEN', CSRF_TOKEN);
         xhr.onreadystatechange = function (){
            if (this.readyState == 4 && this.status == 200) {}
         }
         xhr.send('sort='+arrangment.join(','));
      }
   });
   var menuItemsBox = document.querySelector('.menu-items-box');
   var itemsCount = document.querySelectorAll('.menu-items-box .menu-item-box').length-1;
   var menuItemTemplate = document.getElementById('menu-item-template');
   var addItem = document.querySelector('button#add-menu-item');
   addItem.addEventListener('click', function (){
      itemsCount++;
      var item = menuItemTemplate.content.cloneNode(true);
      var nameInput = item.querySelector('.menu-item-name');
      var linkInput = item.querySelector('.menu-item-link');
      var deleteButton = item.querySelector('.delete-item');
      deleteButton.id = 'delete-menu-item-'+(itemsCount+1);
      deleteButton.setAttribute('onClick', `document.getElementById('menu-item-${itemsCount+1}').remove()`);
      item.querySelector('.menu-item-box').id = 'menu-item-'+(itemsCount+1);
      nameInput.id = 'menu-item-'+itemsCount;
      nameInput.setAttribute('name', `menu_items[${itemsCount}][name]`);
      linkInput.setAttribute('name', `menu_items[${itemsCount}][link]`);
      menuItemsBox.append(item);
   });
</script>
@endsection
