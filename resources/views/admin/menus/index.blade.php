@extends('layouts.admin')
@section('title', __("Menus"))
@section('content')
<div class="lg:pb-20">
   <h2 class="lg:text-2xl text-xl font-bold">Les menus</h2>
   <div class="mt-6">
      <div class="w-full">
         <div class="bg-white flex justify-center flex-col rounded-md shadow-md overflow-hidden group p-4">
            <div class="flex flex-col gap-4">
               @foreach ($menus->filter(function ($q){return $q->location != 'footer';}) as $menu)
               <div class="bg-[#fcfcfc] dark:border-gray-300 dark:border-opacity-10 dark:bg-darkBg rounded-md shadow-sm border-[#e5e5e5] border">
                  <div class="px-[20px] py-[12px] border-b dark:border-gray-300 dark:border-opacity-10 flex items-center justify-between gap-4">
                     <div>
                        <h1 class="font-semibold text-[16px]">{{$menu->name}}</h1>
                     </div>
                     <a href="{{route('admin.menus.edit', $menu->id)}}">
                        <button class="bg-primary text-sm text-primaryText py-2.5 px-5 rounded-lg font-medium flex items-center gap-2.5" type="button">
                           <span>Modifier</span>
                        </button>
                     </a>
                  </div>
                  <div class="p-[20px]">
                     <div class="bg-white dark:border-gray-300 dark:border-opacity-10 dark:bg-darkSurface text-sm rounded-md shadow-sm border-[#e5e5e5] border p-[20px]">
                        @if ($menu->items->isNotEmpty())
                           @foreach ($menu->items as $menuItem)
                              <div class="flex items-center gap-2">
                                 <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 011.242 7.244l-4.5 4.5a4.5 4.5 0 01-6.364-6.364l1.757-1.757m13.35-.622l1.757-1.757a4.5 4.5 0 00-6.364-6.364l-4.5 4.5a4.5 4.5 0 001.242 7.244" />
                                 </svg>
                                 <span>{{$menuItem->name}}</span>
                              </div>
                           @endforeach
                        @else
                        Pas encore de liens
                        @endif
                     </div>
                  </div>
               </div>
               @endforeach
               <div class="grid lg:grid-cols-4 sm:grid-cols-2 grid-cols-1 gap-4">
                  @foreach ($menus->filter(function ($q){return $q->location == 'footer';}) as $menu)
                  <div class="bg-[#fcfcfc] dark:border-gray-300 dark:border-opacity-10 dark:bg-darkBg rounded-md shadow-sm border-[#e5e5e5] border">
                     <div class="px-[20px] py-[12px] border-b dark:border-gray-300 dark:border-opacity-10 flex items-center justify-between gap-4">
                        <div>
                           <h1 class="font-semibold text-[16px]">{{$menu->name}}</h1>
                        </div>
                        <a href="{{route('admin.menus.edit', $menu->id)}}">
                           <button class="bg-primary text-sm text-primaryText py-2.5 px-5 rounded-lg font-medium flex items-center gap-2.5" type="button">
                              <span>Modifier</span>
                           </button>
                        </a>
                     </div>
                     <div class="p-[20px]">
                        <div class="bg-white dark:border-gray-300 dark:border-opacity-10 dark:bg-darkSurface text-sm rounded-md shadow-sm border-[#e5e5e5] border p-[20px]">
                           @if ($menu->items->isNotEmpty())
                              @foreach ($menu->items as $menuItem)
                                 <div class="flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                       <path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 011.242 7.244l-4.5 4.5a4.5 4.5 0 01-6.364-6.364l1.757-1.757m13.35-.622l1.757-1.757a4.5 4.5 0 00-6.364-6.364l-4.5 4.5a4.5 4.5 0 001.242 7.244" />
                                    </svg>
                                    <span>{{$menuItem->name}}</span>
                                 </div>
                              @endforeach
                           @else
                           Pas encore de liens
                           @endif
                        </div>
                     </div>
                  </div>
                  @endforeach
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection