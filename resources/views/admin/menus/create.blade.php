@extends('layouts.admin')
@section('title', __("Create Menu"))
@section('content')
<div id="create-menu-page" class="pb-20">
   <h2 class="font-semibold text-[22px] mb-6">{{__("Create Menu")}}</h2>
   <form class="menu-form" id="create-menu-form" action="{{route('admin.menus.store')}}" method="post">
      @csrf
      <div class="bg-white dark:bg-darkSurface dark:border-gray-300 dark:border-opacity-10 rounded-md shadow-sm border-[#e5e5e5] border">
         <div class="p-[20px] border-b dark:border-gray-300 dark:border-opacity-10">
            <div>
               <h1 class="font-semibold text-[16px]">{{__("Provide a name for this link list")}}</h1>
            </div>
        </div>
        <div class="p-[20px]">
            <div class="flex items-start justify-between gap-4 lg:flex-row flex-col w-full">
               <div class="w-full">
                  <label class="label-control" for="menu-name">{{__("Name")}}</label>
                  <input type="text" id="menu-name" name="menu_name" class="input-control" value="{{old('menu_name')}}" placeholder="{{__("Name")}}" autofocus required>
                  @error('menu_name')
                     <p class="error-msg">{{$message}}</p>
                  @enderror
               </div>
               <div class="lg:w-72 w-full">
                  <label class="label-control" for="menu-location">{{__("Location")}}</label>
                  <select name="menu_location" id="menu-location" class="input-control">
                     <option value="footer" {{old('menu_location')=='footer'?'selected':''}}>{{__("Footer")}}</option>
                     <option value="header" {{old('menu_location')=='header'?'selected':''}}>{{__("Header")}}</option>
                     <option value="aside" {{old('menu_location')=='aside'?'selected':''}}>{{__("Aside")}}</option>
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
               <h1 class="font-semibold text-[16px]">{{__("Drag links to change the order that they appear in your storefront")}}</h1>
            </div>
        </div>
        <div class="p-[20px]">
            <template id="menu-item-template">
               <div class="bg-[#fcfcfc] dark:bg-darkBg dark:border-gray-300 dark:border-opacity-10 rounded-md shadow-sm border-[#e5e5e5] border">
                  <div class="px-[20px] py-[15px]">
                     <div class="flex items-start flex-col lg:flex-row gap-4 w-full menu-item-box">
                        <div class="w-full">
                           <div class="lg:hidden"><label class="label-control">{{__("Name")}}</label></div>
                           <input type="text" class="input-control menu-item-name" placeholder="{{__("Name")}}">
                        </div>
                        <div class="w-full">
                           <div class="lg:hidden"><label class="label-control">{{__("Link")}}</label></div>
                           <input type="text" class="input-control menu-item-link" placeholder="{{__("Link")}}">
                        </div>
                        <div class="w-full">
                           <button class="bg-red-500 py-3.5 px-5 text-sm rounded-lg text-white delete-item" type="button">{{__("Delete")}}</button>
                        </div>
                     </div>
                  </div>
               </div>
            </template>
            <div class="grid grid-cols-1 gap-4 w-full">
               <div class="hidden lg:flex items-start gap-4 w-full">
                  <div class="w-full">
                     <h2>{{__("Name")}}</h2>
                  </div>
                  <div class="w-full">
                     <h2>{{__("Link")}}</h2>
                  </div>
                  <div class="w-full">
                  </div>
               </div>
               <div class="menu-items-box flex flex-col gap-2">
                  <div class="bg-[#fcfcfc] dark:bg-darkBg dark:border-gray-300 dark:border-opacity-10 rounded-md shadow-sm border-[#e5e5e5] border">
                     <div class="px-[20px] py-[15px]">
                        <div class="flex items-start flex-col lg:flex-row gap-4 w-full menu-item-box" id="menu-item-1">
                           <div class="w-full">
                              <div class="lg:hidden"><label for="menu-item-name-1" class="label-control">{{__("Name")}}</label></div>
                              <input type="text" id="menu-item-name-1" name="menu_items[0][name]" class="input-control menu-item-name" value="{{old('menu_items.0.name')}}" placeholder="{{__("Name")}}">
                           </div>
                           <div class="w-full">
                              <div class="lg:hidden"><label for="menu-item-link-1" class="label-control">{{__("Link")}}</label></div>
                              <input type="text" id="menu-item-link-1" name="menu_items[0][link]" class="input-control menu-item-link" value="{{old('menu_items.0.link')}}" placeholder="{{__("Link")}}">
                           </div>
                           <div class="w-full">
                              <button onclick="document.getElementById('menu-item-1').remove()" id="delete-menu-item-1" class="bg-red-500 lg:py-3.5 py-2.5 px-5 text-sm rounded-lg text-white delete-item" type="button">{{__("Delete")}}</button>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <button id="add-menu-item" class="bg-primary w-max py-3 px-5 text-sm rounded-lg text-primaryText" type="button">{{__("Add")}}</button>
            </div>
         </div>
      </div>
      
      <button class="bg-primary lg:fixed bottom-6 ltr:right-4 rtl:left-4 text-primaryText py-2.5 px-5 rounded-lg font-medium mt-4 flex items-center gap-2.5" type="submit">
         <i class="fa fa-floppy-o text-base" aria-hidden="true"></i>
         <span>{{__("Save")}}</span>
      </button>
   </form>
</div>
@endsection
