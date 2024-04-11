<div class="bg-white flex flex-col rounded-[20px] shadow-md overflow-hidden mb-4">
    <div class="relative">
        <button data-vehicule="{{$vehicule->id}}" class="h-[40px] w-[40px] z-10 favorite-btn rounded-full bg-white absolute flex items-center justify-center rtl:left-2 ltr:right-2 top-2 {{auth()->check()?auth()->user()->favorites->isNotEmpty()?in_array($vehicule->id, auth()->user()->favorites->pluck('vehicule_id')->toArray())?'active':'':'':''}}">
            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12.01 6.001C6.5 1 1 8 5.782 13.001L12.011 20l6.23-7C23 8 17.5 1 12.01 6.002Z"/>
            </svg>
        </button>
        <a class="block w-full" href="{{route('vehicule', $vehicule->id)}}">
            <img class="w-full h-full object-cover" src="{{$vehicule->getImage()}}" alt="">
        </a>
    </div>
    <div class="bg-white pb-4 pt-2 px-4">
        <a class="block w-full" href="{{route('vehicule', $vehicule->id)}}">
            <h3 class="font-semibold">
                {{$vehicule->getName()}}
            </h3>
        </a>
        <span class="text-sm text-gray-600">{{$vehicule->description}}</span>
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
            <a class="block w-full" href="{{route('vehicule', $vehicule->id)}}">
                <button class="bg-primary hover:bg-primaryHover w-full font-semibold py-2.5 px-10 rounded-full text-primaryText text-base">
                    Voir l'annonce
                </button>
            </a>
        </div>
    </div>
</div>