<header id="home-header">
    <div class="container lg:px-4 px-2 mx-auto flex items-center gap-4 justify-between h-full">
        <div class="flex items-center gap-3">
            <button onclick="this.querySelector('.bars').classList.toggle('hidden');this.querySelector('.close').classList.toggle('hidden')" class="lg:hidden">
                <svg data-drawer-target="drawer-example" data-drawer-show="drawer-example" aria-controls="drawer-example" class="w-8 h-8 text-gray-800 dark:text-white bars" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M5 7h14M5 12h14M5 17h14"/>
                </svg>
                <svg data-drawer-hide="drawer-example" aria-controls="drawer-example" class="w-8 h-8 text-gray-800 dark:text-white close hidden" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6"/>
                </svg>
            </button>                 
            <a href="{{route('welcome')}}"><h2 class="font-extrabold text-primary lg:text-3xl text-2xl">{{ config('app.name', 'Laravel') }}</h2></a>
        </div>
        <div class="flex items-center lg:divide-x-2 divide-primary">
            <ul id="menu-list" class="">
                <li>
                    <a href="http://">Acheter</a>
                </li>
                <li>
                    <a href="http://">Vendre</a>
                </li>
                <li>
                    <a href="http://">La Cote</a>
                </li>
                <li>
                    <a href="http://">Vous conseiller</a>
                </li>
            </ul>
            <div class="flex items-center lg:gap-6 gap-3 sm:ltr:ml-6 sm:ltr:pl-8 sm:rtl:pr-8 sm:rtl:mr-6">
                <button>
                    <svg class="w-5 h-5 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"/>
                    </svg>                          
                </button>
                <button>
                    <svg class="w-5 h-5 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12.01 6.001C6.5 1 1 8 5.782 13.001L12.011 20l6.23-7C23 8 17.5 1 12.01 6.002Z"/>
                        </svg>                                                   
                </button>
                <a class="flex items-center" href="{{route('login')}}">
                    <button>
                        <svg class="w-5 h-5 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Zm0 0a8.949 8.949 0 0 0 4.951-1.488A3.987 3.987 0 0 0 13 16h-2a3.987 3.987 0 0 0-3.951 3.512A8.948 8.948 0 0 0 12 21Zm3-11a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                        </svg>
                    </button>
                </a>
            </div>
        </div>
    </div>
    <div id="drawer-example" class="fixed top-[55px] left-0 z-40 h-screen p-4 overflow-y-auto transition-transform -translate-x-full bg-white w-80 dark:bg-gray-800" tabindex="-1" aria-labelledby="drawer-label">
        <ul class="text-xl flex flex-col gap-1 divide-y">
            <li>
                <a class="py-3 block" href="http://">Acheter</a>
            </li>
            <li>
                <a class="py-3 block" href="http://">Vendre</a>
            </li>
            <li>
                <a class="py-3 block" href="http://">La Cote</a>
            </li>
            <li>
                <a class="py-3 block" href="http://">Vous conseiller</a>
            </li>
        </ul>
    </div>
</header>
