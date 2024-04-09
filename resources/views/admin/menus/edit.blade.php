@extends('layouts.admin')
@section('title', __("Edit Menu"))
@section('content')
<div id="edit-menu-page" class="pb-20">
   <h2 class="font-semibold text-[22px] mb-6">{{__("Edit Menu")}}</h2>
   <form class="menu-form" id="edit-menu-form" action="{{route('admin.menus.update', $menu->id)}}" method="post">
      @csrf
      @method('PUT')
      <div class="bg-white dark:border-gray-300 dark:border-opacity-10 dark:bg-darkSurface rounded-md shadow-sm border-[#e5e5e5] border">
         <div class="p-[20px] border-b dark:border-gray-300 dark:border-opacity-10">
            <div>
               <h1 class="font-semibold text-[16px]">{{__("Provide a name for this link list")}}</h1>
            </div>
        </div>
        <div class="p-[20px]">
            <div class="">
               <label class="label-control" for="menu-name">{{__("Name")}}</label>
               <input type="text" id="menu-name" name="menu_name" class="input-control" value="{{old('menu_name', $menu->name)}}" placeholder="{{__("Name")}}" autofocus required>
               @error('menu_name')
                  <p class="error-msg">{{$message}}</p>
               @enderror
            </div>
         </div>
      </div>

      <div class="bg-white dark:border-gray-300 dark:border-opacity-10 dark:bg-darkSurface rounded-md shadow-sm border-[#e5e5e5] border mt-4">
         <div class="p-[20px] border-b dark:border-gray-300 dark:border-opacity-10">
            <div>
               <h1 class="font-semibold text-[16px]">{{__("Drag links to change the order that they appear in your storefront")}}</h1>
            </div>
        </div>
        <div class="p-[20px]">
            <template id="menu-item-template">
               <div class="bg-[#fcfcfc] dark:bg-darkBg dark:border-gray-300 dark:border-opacity-10 rounded-md shadow-sm border-[#e5e5e5] border menu-item-box">
                  <div class="px-[20px] py-[15px]">
                     <div class="flex items-start flex-col lg:flex-row gap-4 w-full">
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
                  @foreach ($menu->items as $key => $menuItem)
                  <div class="bg-[#fcfcfc] dark:bg-darkBg dark:border-gray-300 dark:border-opacity-10 rounded-md cursor-move shadow-sm border-[#e5e5e5] border menu-item-box" data-id="{{$menuItem->id}}" id="menu-item-{{$key+1}}">
                     <div class="px-[20px] py-[15px]">
                        <div class="flex items-center flex-col lg:flex-row gap-4 w-full">
                           {{-- <div class="drag cursor-move flex overflow-hidden items-center gap-2 whitespace-nowrap text-ellipsis truncate w-20">
                              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 flex-shrink-0">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                              </svg>
                           </div> --}}
                           <div class="w-full">
                              <div class="lg:hidden"><label for="menu-item-name-{{$key+1}}" class="label-control">{{__("Name")}}</label></div>
                              <input type="text" id="menu-item-name-{{$key+1}}" name="menu_items[{{$key}}][name]" class="input-control menu-item-name" value="{{old('menu_items.'.$key.'.name', $menuItem->name)}}" placeholder="{{__("Name")}}">
                           </div>
                           <div class="w-full">
                              <div class="lg:hidden"><label for="menu-item-link-{{$key+1}}" class="label-control">{{__("Link")}}</label></div>
                              <input type="text" id="menu-item-link-{{$key+1}}" name="menu_items[{{$key}}][link]" class="input-control menu-item-link" value="{{old('menu_items.'.$key.'.link', $menuItem->url)}}" placeholder="{{__("Link")}}">
                           </div>
                           <div class="w-full">
                              <button onclick="document.getElementById('menu-item-{{$key+1}}').remove()" id="delete-menu-item-{{$key+1}}" class="bg-red-500 lg:py-3.5 py-2.5 px-5 text-sm rounded-lg text-white delete-item" type="button">{{__("Delete")}}</button>
                           </div>
                        </div>
                     </div>
                  </div>
                  
                  @endforeach
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
@section('top-scripts')
<script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
@endsection