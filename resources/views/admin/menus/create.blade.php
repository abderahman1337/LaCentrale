@extends('layouts.admin')
@section('title', 'Créer un menu')
@section('content')
<div id="create-menu-page" class="pb-20">
   <h2 class="font-semibold text-[22px] mb-6">Créer un menu</h2>
   <form class="menu-form" id="create-menu-form" action="{{route('admin.menus.store')}}" method="post">
      @csrf
      <div class="bg-white dark:bg-darkSurface dark:border-gray-300 dark:border-opacity-10 rounded-md shadow-sm border-[#e5e5e5] border">
         <div class="p-[20px] border-b dark:border-gray-300 dark:border-opacity-10">
            <div>
               <h1 class="font-semibold text-[16px]">Donnez un nom à cette liste de liens</h1>
            </div>
        </div>
        <div class="p-[20px]">
            <div class="flex items-start justify-between gap-4 lg:flex-row flex-col w-full">
               <div class="w-full">
                  <label class="label-control" for="menu-name">Nom</label>
                  <input type="text" id="menu-name" name="menu_name" class="input-control" value="{{old('menu_name')}}" placeholder="Nom" autofocus required>
                  @error('menu_name')
                     <p class="error-msg">{{$message}}</p>
                  @enderror
               </div>
               <div class="lg:w-72 w-full">
                  <label class="label-control" for="menu-location">Emplacement</label>
                  <select name="menu_location" id="menu-location" class="input-control">
                     <option value="footer" {{old('menu_location')=='footer'?'selected':''}}>{{__("Footer")}}</option>
                     <option value="header" {{old('menu_location')=='header'?'selected':''}}>{{__("Header")}}</option>
                  </select>
                  @error('menu_location')
                     <p class="error-msg">{{$message}}</p>
                  @enderror
               </div>
            </div>
         </div>
      </div>

      <div class="bg-white dark:bg-darkSurface dark:border-gray-300 dark:border-opacity-10 rounded-md shadow-sm border-[#e5e5e5] border mt-4">
         <div class="p-[20px] border-b dark:border-gray-300 dark:border-opacity-10">
            <div>
               <h1 class="font-semibold text-[16px]">Faites glisser les liens pour modifier l'ordre dans lequel ils apparaissent dans la police de votre site Web</h1>
            </div>
        </div>
        <div class="p-[20px]">
            <template id="menu-item-template">
               <div class="bg-[#fcfcfc] dark:bg-darkBg dark:border-gray-300 dark:border-opacity-10 rounded-md shadow-sm border-[#e5e5e5] border">
                  <div class="px-[20px] py-[15px]">
                     <div class="flex items-start flex-col lg:flex-row gap-4 w-full menu-item-box">
                        <div class="w-full">
                           <div class="lg:hidden"><label class="label-control">Nom</label></div>
                           <input type="text" class="input-control menu-item-name" placeholder="Nom">
                        </div>
                        <div class="w-full">
                           <div class="lg:hidden"><label class="label-control">Lien</label></div>
                           <input type="text" class="input-control menu-item-link" placeholder="Lien">
                        </div>
                        <div class="w-full">
                           <button class="bg-red-500 py-3.5 px-5 text-sm rounded-lg text-white delete-item" type="button">Supprimer</button>
                        </div>
                     </div>
                  </div>
               </div>
            </template>
            <div class="grid grid-cols-1 gap-4 w-full">
               <div class="hidden lg:flex items-start gap-4 w-full">
                  <div class="w-full">
                     <h2>Nom</h2>
                  </div>
                  <div class="w-full">
                     <h2>Lien</h2>
                  </div>
                  <div class="w-full">
                  </div>
               </div>
               <div class="menu-items-box flex flex-col gap-2">
                  <div class="bg-[#fcfcfc] dark:bg-darkBg dark:border-gray-300 dark:border-opacity-10 rounded-md shadow-sm border-[#e5e5e5] border">
                     <div class="px-[20px] py-[15px]">
                        <div class="flex items-start flex-col lg:flex-row gap-4 w-full menu-item-box" id="menu-item-1">
                           <div class="w-full">
                              <div class="lg:hidden"><label for="menu-item-name-1" class="label-control">Nom</label></div>
                              <input type="text" id="menu-item-name-1" name="menu_items[0][name]" class="input-control menu-item-name" value="{{old('menu_items.0.name')}}" placeholder="Nom">
                           </div>
                           <div class="w-full">
                              <div class="lg:hidden"><label for="menu-item-link-1" class="label-control">Lien</label></div>
                              <input type="text" id="menu-item-link-1" name="menu_items[0][link]" class="input-control menu-item-link" value="{{old('menu_items.0.link')}}" placeholder="Lien">
                           </div>
                           <div class="w-full">
                              <button onclick="document.getElementById('menu-item-1').remove()" id="delete-menu-item-1" class="bg-red-500 lg:py-3.5 py-2.5 px-5 text-sm rounded-lg text-white delete-item" type="button">Supprimer</button>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <button id="add-menu-item" class="bg-primary w-max py-3 px-5 text-sm rounded-lg text-primaryText" type="button">Ajouter</button>
            </div>
         </div>
      </div>
      
      <button class="bg-primary text-primaryText py-2.5 px-5 rounded-lg font-medium mt-4 flex items-center gap-2.5" type="submit">
         <span>Sauvgarder</span>
      </button>
   </form>
</div>
@endsection
