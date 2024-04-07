<div class="bg-white flex flex-col rounded-[20px] shadow-md overflow-hidden mb-4">
    <div class="relative">
        <button class="h-[40px] w-[40px] rounded-full bg-white absolute flex items-center justify-center rtl:left-2 ltr:right-2 top-2">
            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12.01 6.001C6.5 1 1 8 5.782 13.001L12.011 20l6.23-7C23 8 17.5 1 12.01 6.002Z"/>
            </svg>
        </button>
        <img class="w-full h-full object-cover" src="{{$vehicule->getImage()}}" alt="">
    </div>
    <div class="bg-white pb-4 pt-2 px-4">
        <h3 class="font-semibold">{{$vehicule->type->brand->name}} {{$vehicule->type->name}} {{-- MERCEDES CLASSE A III phase 2 --}}</h3>
        <span class="text-sm text-gray-600">2.1 200 D 136 SPORT EDITION</span>
        <div class="mt-2">
            <ul class="text-xs flex items-center text-ellipsis divide-x">
                @if ($vehicule->year)
                <li class="whitespace-nowrap pr-2">{{$vehicule->year}}</li>
                @endif
                @if ($vehicule->mileage)
                <li class="whitespace-nowrap px-2">{{number_format($vehicule->mileage, 0, ' ', ' ')}} km</li>
                @endif
                @if ($vehicule->gearbox)
                <li class="whitespace-nowrap px-2">
                    @if ($vehicule->gearbox == 'automatic')
                    Automatique
                    @elseif($vehicule->gearbox == 'manual')
                    Manuelle
                    @endif
                </li>
                @endif
                @if ($vehicule->energy)
                <li class="whitespace-nowrap px-2">{{$vehicule->energy->name}}</li>
                @endif
            </ul>
        </div>
        <hr class="mt-4">
        <div class="mt-4">
            <span class="font-semibold">{{number_format($vehicule->price, 0, ' ', ' ')}} €</span>
        </div>
        <div class="flex justify-center mt-4">
            <button class="bg-indigo-600 hover:bg-indigo-400 w-full font-semibold py-2.5 px-10 rounded-full text-white text-base">
                Voir l'annonce
            </button>
        </div>
    </div>
</div>