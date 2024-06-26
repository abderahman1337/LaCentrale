@php
    $headerMenu = Cache::remember('header-menu', config('app.cache_remember'), function () {
        return App\Models\MenuItem::whereHas('menu', function($q){$q->where('location', 'header');})->orderBy('order')->get();
    });
@endphp
<header id="home-header">
    <div class="container lg:px-0 px-4 mx-auto flex items-center gap-4 justify-between h-full">
        <div class="flex items-center gap-1">
            <button onclick="this.querySelector('.bars').classList.toggle('hidden');this.querySelector('.close').classList.toggle('hidden')" class="lg:hidden">
                <svg data-drawer-target="drawer-example" data-drawer-show="drawer-example" aria-controls="drawer-example" class="w-6 h-6 text-gray-800 dark:text-white bars" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M5 7h14M5 12h14M5 17h14"/>
                </svg>
                <svg data-drawer-hide="drawer-example" aria-controls="drawer-example" class="w-6 h-6 text-gray-800 dark:text-white close hidden" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6"/>
                </svg>
            </button>                 
            <a href="{{route('welcome')}}"><h2 class="font-extrabold text-primary lg:text-3xl text-2xl">{{ $websiteName }}</h2></a>
        </div>
        <div class="flex items-center lg:divide-x-2 divide-primary">
            <ul id="menu-list" class="">
                @foreach ($headerMenu as $menuItem)
                <li>
                    <a href="{{$menuItem->url}}">{{$menuItem->name}}</a>
                </li>
                @endforeach
            </ul>
            <div class="flex items-center lg:gap-6 gap-3 sm:ltr:ml-6 sm:ltr:pl-8 sm:rtl:pr-8 sm:rtl:mr-6">
                <a aria-label="Référencement" class="flex items-center" href="{{route('vehicules.listing')}}">
                    <button>
                        <svg class="w-5 h-5 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"/>
                        </svg>                          
                    </button>
                </a>
                <a aria-label="Favoris" class="flex items-center" href="{{route('favorite.list')}}">
                    <button>
                        <svg class="w-5 h-5 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12.01 6.001C6.5 1 1 8 5.782 13.001L12.011 20l6.23-7C23 8 17.5 1 12.01 6.002Z"/>
                            </svg>                                                   
                    </button>
                </a>
                @auth
                    @if (auth()->user()->isAdmin())
                    <a class="flex items-center" href="{{route('admin.dashboard')}}">
                        <button>
                            <svg class="w-5 h-5 text-blue-600 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M12 20a7.966 7.966 0 0 1-5.002-1.756l.002.001v-.683c0-1.794 1.492-3.25 3.333-3.25h3.334c1.84 0 3.333 1.456 3.333 3.25v.683A7.966 7.966 0 0 1 12 20ZM2 12C2 6.477 6.477 2 12 2s10 4.477 10 10c0 5.5-4.44 9.963-9.932 10h-.138C6.438 21.962 2 17.5 2 12Zm10-5c-1.84 0-3.333 1.455-3.333 3.25S10.159 13.5 12 13.5c1.84 0 3.333-1.455 3.333-3.25S13.841 7 12 7Z" clip-rule="evenodd"/>
                            </svg>
                        </button>
                    </a>
                    @else
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="flex items-center">
                                <svg class="w-5 h-5 text-blue-600 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M12 20a7.966 7.966 0 0 1-5.002-1.756l.002.001v-.683c0-1.794 1.492-3.25 3.333-3.25h3.334c1.84 0 3.333 1.456 3.333 3.25v.683A7.966 7.966 0 0 1 12 20ZM2 12C2 6.477 6.477 2 12 2s10 4.477 10 10c0 5.5-4.44 9.963-9.932 10h-.138C6.438 21.962 2 17.5 2 12Zm10-5c-1.84 0-3.333 1.455-3.333 3.25S10.159 13.5 12 13.5c1.84 0 3.333-1.455 3.333-3.25S13.841 7 12 7Z" clip-rule="evenodd"/>
                                </svg>
                            </button>
                        </x-slot>
    
                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                Profil
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('favorite.list')">
                                Favoris
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('auctions.list')">
                                Mes enchères
                            </x-dropdown-link>
                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
    
                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    Se déconnecter
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                    @endif
                @else
                <a aria-label="Se connecter" class="flex items-center" href="{{route('login')}}">
                    <button>
                        <svg class="w-5 h-5 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Zm0 0a8.949 8.949 0 0 0 4.951-1.488A3.987 3.987 0 0 0 13 16h-2a3.987 3.987 0 0 0-3.951 3.512A8.948 8.948 0 0 0 12 21Zm3-11a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                        </svg>
                    </button>
                </a>
                @endauth
            </div>
        </div>
    </div>
    <div id="drawer-example" class="fixed top-[55px] left-0 z-40 h-screen p-4 overflow-y-auto transition-transform -translate-x-full bg-white w-80 dark:bg-gray-800" tabindex="-1" aria-labelledby="drawer-label">
        <ul class="text-xl flex flex-col gap-1 divide-y">
            @foreach ($headerMenu as $menuItem)
            <li>
                <a class="py-3 block" href="{{$menuItem->url}}">{{$menuItem->name}}</a>
            </li>
            @endforeach
        </ul>
    </div>
</header>
