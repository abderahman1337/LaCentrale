@php
    $page_title = $vehicule->getName();
    $page_image = $vehicule->getImage();
    $vehicule_name = $vehicule->getName();
    $vehicule_price = $vehicule->price;
@endphp
@extends('layouts.home')
@section('title', $vehicule->getName())
@section('content')
<div class="mb-10 flex flex-col-reverse lg:flex-row items-start gap-10">
    <div class="lg:w-[65%] w-full">
        <div id="controls-carousel" class="relative w-full" data-carousel="static">
            <!-- Carousel wrapper -->
            <div class="relative h-56 overflow-hidden rounded-lg md:h-[500px]">
                <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
                    <img src="{{$vehicule->getImage()}}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
                @foreach ($vehicule->images as $vehiculeImage)
                <div class="hidden duration-700 ease-in-out" data-carousel-item="">
                    <img src="{{$vehiculeImage->getImage()}}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
                @endforeach
            </div>
            @if ($vehicule->images->isNotEmpty())
            <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                    </svg>
                    <span class="sr-only">Previous</span>
                </span>
            </button>
            <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
            @endif
        </div>
        <hr>
        <div class="mt-6 mb-6">
            <h2 class="text-xl font-semibold">Informations générales</h2>
            <p class="mt-2 text-gray-600 text-sm">{{$vehicule->getName()}}</p>
            <p class="mt-2 text-gray-600 text-sm"><section>{!! $vehicule->description !!}</section></p>
            <hr class="mt-4">
            <div class="mt-6">
                <div class="grid lg:grid-cols-2 grid-cols-1 gap-10">
                    <div>
                        <h2 class="text-xl font-semibold">Caractéristiques</h2>
                        <div class="mt-4 flex flex-col gap-2">
                            <div>
                                <span class="font-medium">Année :</span> 
                                <span class="text-gray-700">
                                    @if ($vehicule->year)
                                    {{$vehicule->year}}
                                    @else
                                    donnés non disponsable
                                    @endif
                                </span>
                            </div>
                            <div>
                                <span class="font-medium">Provenance :</span> 
                                <span class="text-gray-700">
                                    @if ($vehicule->origin)
                                    {{$vehicule->origin}}
                                    @else
                                    donnés non disponsable
                                    @endif
                                </span>
                            </div>
                            <div>
                                <span class="font-medium">Mise en circulation :</span> 
                                <span class="text-gray-700">
                                    @if ($vehicule->release_date)
                                    {{$vehicule->release_date}}
                                    @else
                                    donnés non disponsable
                                    @endif
                                </span>
                            </div>
                            <div>
                                <span class="font-medium">Contrôle technique :</span> 
                                <span class="text-gray-700">
                                    @if ($vehicule->technical_control)
                                    Requis
                                    @else
                                    Non requis
                                    @endif
                                </span>
                            </div>
                            <div>
                                <span class="font-medium">Première main :</span> 
                                <span class="text-gray-700">
                                    @if ($vehicule->first_owner)
                                    Oui
                                    @else
                                    Non
                                    @endif
                                </span>
                            </div>
                            <div>
                                <span class="font-medium">Kilométrage compteur :</span> 
                                <span class="text-gray-700">
                                    @if ($vehicule->mileage)
                                    {{number_format($vehicule->mileage, 0, ' ', ' ')}} km
                                    @else
                                    donnés non disponsable
                                    @endif
                                </span>
                            </div>
                            <div>
                                <span class="font-medium">Energie :</span> 
                                <span class="text-gray-700">
                                    @if ($vehicule->energy)
                                    {{$vehicule->energy->name}}
                                    @else
                                    donnés non disponsable
                                    @endif
                                </span>
                            </div>
                            <div>
                                <span class="font-medium">Boîte de vitesse :</span> 
                                <span class="text-gray-700">
                                    @if ($vehicule->gearbox == 'automatic')
                                    Automatique
                                    @elseif($vehicule->gearbox == 'manual') 
                                    Manuelle
                                    @else
                                    donnés non disponsable
                                    @endif
                                </span>
                            </div>
                            <div>
                                <span class="font-medium">Couleur :</span> 
                                <span class="text-gray-700">
                                    @if ($vehicule->color)
                                    {{$vehicule->color->name}}
                                    @else
                                    donnés non disponsable
                                    @endif
                                </span>
                            </div>
                            <div>
                                <span class="font-medium">Nombre de portes :</span> 
                                <span class="text-gray-700">
                                    @if ($vehicule->doors_number)
                                    {{$vehicule->doors_number}}
                                    @else
                                    donnés non disponsable
                                    @endif
                                </span>
                            </div>
                            <div>
                                <span class="font-medium">Nombre de places :</span> 
                                <span class="text-gray-700">
                                    @if ($vehicule->places_number)
                                    {{$vehicule->places_number}}
                                    @else
                                    donnés non disponsable
                                    @endif
                                </span>
                            </div>
                            <div>
                                <span class="font-medium">Longeur :</span> 
                                <span class="text-gray-700">
                                    @if ($vehicule->length)
                                    {{$vehicule->length}} m
                                    @else
                                    donnés non disponsable
                                    @endif
                                </span>
                            </div>
                            <div>
                                <span class="font-medium">Hauter :</span> 
                                <span class="text-gray-700">
                                    @if ($vehicule->height)
                                    {{$vehicule->height}} m
                                    @else
                                    donnés non disponsable
                                    @endif
                                </span>
                            </div>
                            <div>
                                <span class="font-medium">Largeur :</span> 
                                <span class="text-gray-700">
                                    @if ($vehicule->width)
                                    {{$vehicule->width}} m
                                    @else
                                    donnés non disponsable
                                    @endif
                                </span>
                            </div>
                            <div>
                                <span class="font-medium">Volume de coffre :</span> 
                                <span class="text-gray-700">
                                    @if ($vehicule->trunk_volume)
                                    {{$vehicule->trunk_volume}} L
                                    @else
                                    donnés non disponsable
                                    @endif
                                </span>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div>
                            <h2 class="text-xl font-semibold">Puissance du véhicule</h2>
                            <div class="mt-4 flex flex-col gap-2">
                                <div>
                                    <span class="font-medium">Puissance fiscale :</span> 
                                    <span class="text-gray-700">
                                        @if ($vehicule->fiscal_horsepower)
                                        {{$vehicule->fiscal_horsepower}} CV
                                        @else
                                        donnés non disponsable
                                        @endif
                                    </span>
                                </div>
                                <div>
                                    <span class="font-medium">Puissance :</span> 
                                    <span class="text-gray-700">
                                        @if ($vehicule->power)
                                        (DIN) {{$vehicule->power}} CH
                                        @else
                                        donnés non disponsable
                                        @endif
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4">
                            <h2 class="text-xl font-semibold">Consommation</h2>
                            <div class="mt-4 flex flex-col gap-2">
                                <div>
                                    <span class="font-medium">Norme euro :</span> 
                                    <span class="text-gray-700">
                                        @if ($vehicule->euro_standars)
                                        {{$vehicule->euro_standars}}
                                        @else
                                        donnés non disponsable
                                        @endif
                                    </span>
                                </div>
                                <div>
                                    <span class="font-medium">Crit'Air :</span> <span class="text-gray-700">{{$vehicule->air_quality_certificate}}</span>
                                    @if ($vehicule->air_quality_certificate == 0)
                                    <svg xmlns="http://www.w3.org/2000/svg" class="inline-block -mt-1" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path d="M12 23C18.0751 23 23 18.0751 23 12C23 5.92486 18.0751 1 12 1C5.92485 1 1 5.92486 1 12C1 18.0751 5.92485 23 12 23Z" fill="white"/>
                                        <path d="M12 22.6857C17.9016 22.6857 22.6857 17.9016 22.6857 12C22.6857 6.09847 17.9016 1.3143 12 1.3143C6.09846 1.3143 1.3143 6.09847 1.3143 12C1.3143 17.9016 6.09846 22.6857 12 22.6857Z" fill="#009650"/>
                                        <path d="M11.9999 19.4313C16.1041 19.4313 19.4312 16.1042 19.4312 12C19.4312 7.89583 16.1041 4.56872 11.9999 4.56872C7.89571 4.56872 4.56863 7.89583 4.56863 12C4.56863 16.1042 7.89571 19.4313 11.9999 19.4313Z" fill="#5CBF8F"/>
                                        <path d="M12 19.117C15.9306 19.117 19.117 15.9306 19.117 12C19.117 8.0694 15.9306 4.88301 12 4.88301C8.06939 4.88301 4.88304 8.0694 4.88304 12C4.88304 15.9306 8.06939 19.117 12 19.117Z" fill="white"/>
                                        <path d="M10.4988 8.23103C11.7083 8.18964 12.7553 8.67842 13.7443 9.29124C14.6491 9.85519 15.5297 10.4624 16.3878 11.0959C16.7154 11.3379 16.9855 11.6499 17.1786 12.0095C17.5525 12.7389 17.2702 13.5378 16.5131 13.9307C16.1354 14.0897 15.7467 14.221 15.3502 14.3236C15.2802 14.3464 15.2184 14.3896 15.1726 14.4477C15.0721 14.6034 14.9366 14.7331 14.7769 14.8262C14.6172 14.9194 14.438 14.9734 14.2537 14.9838C14.0694 14.9943 13.8852 14.9609 13.7161 14.8863C13.547 14.8118 13.3979 14.6982 13.2806 14.5548C13.2023 14.4649 13.0924 14.409 12.974 14.3988C12.172 14.3856 11.37 14.3875 10.5679 14.3988C10.4802 14.4022 10.3969 14.4384 10.3343 14.5003C9.9155 14.9834 9.46681 15.0849 8.90592 14.8105C8.71202 14.7008 8.55658 14.5336 8.46084 14.3317C8.36514 14.1298 8.33385 13.903 8.37125 13.6825C8.42348 13.453 8.54584 13.2456 8.7212 13.0895C8.89652 12.9334 9.11606 12.8365 9.349 12.8122C9.54495 12.7933 9.74234 12.8284 9.9199 12.9139C10.0975 12.9993 10.2485 13.1318 10.3567 13.2972C10.3781 13.329 10.4057 13.356 10.4378 13.3767C10.47 13.3974 10.506 13.4113 10.5436 13.4175C11.3775 13.4175 12.2113 13.4087 13.0451 13.3912C13.08 13.3868 13.1137 13.3752 13.144 13.3571C13.1742 13.339 13.2004 13.3147 13.2208 13.2859C13.3207 13.1478 13.449 13.0328 13.5969 12.9487C13.7448 12.8647 13.9089 12.8135 14.0782 12.7987C14.2474 12.784 14.4178 12.8058 14.5779 12.863C14.738 12.9201 14.8841 13.0111 15.0062 13.1299C15.2848 13.4156 15.5372 13.4476 15.8905 13.2427C16.4383 12.9231 16.4289 12.3911 15.8325 12.0208C15.3932 11.7482 14.8978 11.5696 14.4622 11.2858C13.8733 10.9004 13.318 10.4624 12.7572 10.0338C12.0094 9.46982 11.1998 9.10515 10.2408 9.12392C9.75418 9.1565 9.2863 9.32511 8.88992 9.61073C8.4935 9.89639 8.18436 10.2877 7.99732 10.7406C7.73746 11.3722 7.83096 11.9775 7.97866 12.6016C8.04937 12.9165 8.08946 13.2376 8.0983 13.5604C8.08654 13.6838 8.02835 13.7981 7.93565 13.8799C7.90572 13.9062 7.7188 13.8329 7.67203 13.7615C7.4202 13.411 7.20233 13.0371 7.02144 12.6449C6.78657 12.0951 6.75019 11.48 6.9186 10.906C7.21401 9.99053 7.66641 9.18598 8.58438 8.70285C9.17573 8.39367 9.83228 8.23186 10.4988 8.23103Z" fill="#009650"/>
                                        </svg>
                                    @elseif ($vehicule->air_quality_certificate == 1)
                                    <svg xmlns="http://www.w3.org/2000/svg" class="inline-block -mt-1" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path d="M12 23C18.0751 23 23 18.0751 23 12C23 5.92485 18.0751 1 12 1C5.92485 1 1 5.92485 1 12C1 18.0751 5.92485 23 12 23Z" fill="white"/>
                                        <path d="M12 22.6856C17.9016 22.6856 22.6857 17.9015 22.6857 11.9999C22.6857 6.09835 17.9016 1.31421 12 1.31421C6.09846 1.31421 1.3143 6.09835 1.3143 11.9999C1.3143 17.9015 6.09846 22.6856 12 22.6856Z" fill="#794685"/>
                                        <path d="M12 19.4312C16.1042 19.4312 19.4313 16.1041 19.4313 11.9999C19.4313 7.89571 16.1042 4.56863 12 4.56863C7.89582 4.56863 4.56872 7.89571 4.56872 11.9999C4.56872 16.1041 7.89582 19.4312 12 19.4312Z" fill="#B48AB8"/>
                                        <path d="M11.9999 19.117C15.9305 19.117 19.1169 15.9306 19.1169 12C19.1169 8.0694 15.9305 4.88304 11.9999 4.88304C8.06932 4.88304 4.88292 8.0694 4.88292 12C4.88292 15.9306 8.06932 19.117 11.9999 19.117Z" fill="#905F99"/>
                                        <path d="M11.8335 8.79312C11.306 9.07601 10.8234 9.43275 10.4008 9.85208C10.3293 9.81946 10.263 9.77663 10.2042 9.72501C10.0551 9.5492 9.91034 9.36709 9.77204 9.17858C9.7502 9.15275 9.73499 9.12213 9.72759 9.08936C9.72019 9.05659 9.72084 9.02257 9.72949 8.9901C9.73813 8.95763 9.75452 8.92762 9.77735 8.90259C9.80015 8.87756 9.82868 8.85817 9.86061 8.84607L11.8659 7.66221C11.9138 7.63171 11.9674 7.61085 12.0236 7.6008L13.9554 7.44828C14.1326 7.43557 14.2212 7.52243 14.2407 7.6982C14.3006 8.19267 14.2779 8.69336 14.1737 9.1807C14.0678 9.65935 13.9792 10.1401 13.8733 10.6187C13.7869 11.0063 13.681 11.3897 13.5924 11.7751C13.5038 12.1606 13.4195 12.5142 13.3483 12.8849C13.2294 13.5372 13.0976 14.2001 12.996 14.863C12.9355 15.2547 12.9117 15.655 12.8901 16.0511C12.8943 16.0898 12.8904 16.1289 12.8787 16.166C12.8671 16.2032 12.8478 16.2377 12.8222 16.2674C12.7965 16.2971 12.765 16.3214 12.7295 16.3388C12.694 16.3562 12.6553 16.3664 12.6157 16.3687C12.2037 16.4238 11.7896 16.4725 11.3732 16.5149C11.1464 16.5378 10.9184 16.5491 10.6904 16.5488C10.4592 16.5488 10.4073 16.4831 10.4333 16.265C10.5024 15.7059 10.5564 15.1425 10.6494 14.5834C10.7142 14.1874 10.8265 13.7977 10.9195 13.4059C11.0124 13.014 11.1053 12.6074 11.2025 12.2093C11.2998 11.8111 11.4186 11.3621 11.5202 10.9385C11.6217 10.515 11.6995 10.0384 11.786 9.58944C11.8183 9.41792 11.8551 9.24848 11.8745 9.07483C11.8715 8.97974 11.8577 8.88525 11.8335 8.79312Z" fill="white"/>
                                        </svg>
                                    @elseif ($vehicule->air_quality_certificate == 2)
                                    <svg xmlns="http://www.w3.org/2000/svg" class="inline-block -mt-1" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path d="M12 23C18.0751 23 23 18.0751 23 12C23 5.92485 18.0751 1 12 1C5.92485 1 1 5.92485 1 12C1 18.0751 5.92485 23 12 23Z" fill="white"/>
                                        <path d="M12 22.6856C17.9016 22.6856 22.6857 17.9015 22.6857 11.9999C22.6857 6.09835 17.9016 1.31421 12 1.31421C6.09846 1.31421 1.3143 6.09835 1.3143 11.9999C1.3143 17.9015 6.09846 22.6856 12 22.6856Z" fill="#EDBE31"/>
                                        <path d="M12.0001 19.4312C16.1043 19.4312 19.4314 16.1041 19.4314 11.9999C19.4314 7.89571 16.1043 4.56863 12.0001 4.56863C7.8959 4.56863 4.56882 7.89571 4.56882 11.9999C4.56882 16.1041 7.8959 19.4312 12.0001 19.4312Z" fill="#F3DD53"/>
                                        <path d="M12 19.117C15.9306 19.117 19.117 15.9306 19.117 12C19.117 8.0694 15.9306 4.88304 12 4.88304C8.0694 4.88304 4.88304 8.0694 4.88304 12C4.88304 15.9306 8.0694 19.117 12 19.117Z" fill="#F2D036"/>
                                        <path d="M10.2103 9.79753L9.57245 9.45999C9.74341 8.88351 10.1204 8.52624 10.504 8.19089C11.1958 7.57967 12.0954 7.25653 13.0181 7.28783C13.3927 7.28237 13.7641 7.35789 14.1068 7.50919C14.4495 7.66054 14.7555 7.88407 15.0039 8.16457C15.4576 8.69719 15.5081 9.32628 15.3941 9.97509C15.2499 10.6793 14.9216 11.3327 14.4428 11.8689C14.0241 12.3686 13.6011 12.8684 13.1474 13.3374C12.812 13.6859 12.4285 13.995 12.0515 14.304C11.955 14.3851 11.8323 14.4509 11.8849 14.589C11.9098 14.6323 11.9433 14.6702 11.9832 14.7003C12.0231 14.7304 12.0687 14.7522 12.1172 14.7643C12.7338 14.9298 13.3667 15.0268 14.0044 15.0537C14.1795 15.0736 14.3563 15.0366 14.5087 14.9482C14.6611 14.8598 14.781 14.7246 14.8505 14.5627C14.8731 14.5239 14.9012 14.4884 14.9338 14.4575C14.9604 14.4376 14.9882 14.4193 15.0171 14.4027L15.5409 14.5561C15.3459 15.2137 15.302 15.8712 14.833 16.3775C14.6868 16.5314 14.4958 16.635 14.2872 16.6734C13.6967 16.7827 13.0867 16.6712 12.5731 16.36C12.1808 16.1058 11.7599 15.8932 11.3501 15.6674C11.2353 15.5911 11.0965 15.5599 10.9602 15.5797C10.8238 15.5995 10.6996 15.669 10.6114 15.7748C10.3483 16.0247 10.0587 16.2452 9.74781 16.4324C9.44751 16.6121 9.22174 16.6998 8.91708 16.3118C8.77021 16.1233 8.60362 15.9501 8.46555 15.7573C8.41354 15.6806 8.3857 15.5901 8.3857 15.4975C8.3857 15.4049 8.41354 15.3144 8.46555 15.2378C8.87103 14.475 9.36641 14.1966 10.2651 14.3281C10.3741 14.3565 10.4888 14.3544 10.5967 14.3219C10.7045 14.2894 10.8014 14.2279 10.8766 14.144C11.8257 13.1007 12.6718 11.9938 12.9896 10.5801C13.0567 10.2527 13.0715 9.91687 13.0334 9.58493C13.0095 9.43116 12.9537 9.28406 12.8697 9.15301C12.7857 9.022 12.6754 8.90991 12.5456 8.82388C12.4159 8.73789 12.2697 8.67986 12.1163 8.65353C11.9629 8.62721 11.8057 8.63313 11.6547 8.67091C11.2538 8.76592 10.8909 8.97985 10.6136 9.28463C10.4821 9.45122 10.3615 9.60686 10.2103 9.79753Z" fill="white"/>
                                    </svg>
                                    @elseif ($vehicule->air_quality_certificate == 3)
                                    <svg xmlns="http://www.w3.org/2000/svg" class="inline-block -mt-1" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path d="M12 23C18.0751 23 23 18.0751 23 12C23 5.92485 18.0751 1 12 1C5.92487 1 1 5.92485 1 12C1 18.0751 5.92487 23 12 23Z" fill="white"/>
                                        <path d="M12.0001 22.6856C17.9017 22.6856 22.6858 17.9015 22.6858 11.9999C22.6858 6.09835 17.9017 1.31421 12.0001 1.31421C6.09855 1.31421 1.31439 6.09835 1.31439 11.9999C1.31439 17.9015 6.09855 22.6856 12.0001 22.6856Z" fill="#E58637"/>
                                        <path d="M12 19.4312C16.1042 19.4312 19.4313 16.1041 19.4313 11.9999C19.4313 7.89571 16.1042 4.56863 12 4.56863C7.8958 4.56863 4.56872 7.89571 4.56872 11.9999C4.56872 16.1041 7.8958 19.4312 12 19.4312Z" fill="#FAB66B"/>
                                        <path d="M12 19.117C15.9306 19.117 19.117 15.9306 19.117 12C19.117 8.0694 15.9306 4.88304 12 4.88304C8.06941 4.88304 4.88302 8.0694 4.88302 12C4.88302 15.9306 8.06941 19.117 12 19.117Z" fill="#ED983F"/>
                                        <path d="M13.7205 11.5162C14.0933 11.8013 14.5056 12.0228 14.7907 12.354C15.5122 13.1917 15.4487 14.4834 14.6942 15.3563C13.3784 16.8914 10.8213 17.172 9.21166 15.9571C8.53183 15.4461 8.33443 14.6084 8.78619 13.9834C8.84692 13.8975 8.92566 13.8258 9.01696 13.7736C9.10826 13.7213 9.20988 13.6896 9.31472 13.6808C9.83445 13.7478 10.3478 13.8571 10.8499 14.0075C10.9113 14.0238 10.9688 14.0524 11.0188 14.0917C11.0688 14.1309 11.1103 14.18 11.1407 14.2358C11.1711 14.2917 11.1897 14.3531 11.1955 14.4164C11.2013 14.4797 11.1941 14.5436 11.1744 14.604C11.1395 14.7617 11.1218 14.9228 11.1218 15.0843C11.1218 15.2466 11.1218 15.5229 11.192 15.547C11.2789 15.5803 11.3721 15.594 11.465 15.5872C11.5579 15.5804 11.6481 15.5532 11.7293 15.5076C11.9809 15.3128 12.1874 15.0659 12.3345 14.7838C12.4572 14.485 12.5234 14.166 12.5297 13.843C12.5845 12.8013 12.488 12.1347 10.9946 12.1851C10.7753 12.1851 10.556 12.1851 10.5713 11.8781C10.5867 11.571 10.4573 11.2202 10.9091 11.1302C11.2126 11.0773 11.5123 11.004 11.806 10.911C12.093 10.8102 12.3378 10.616 12.5013 10.3596C12.6647 10.1031 12.7373 9.79913 12.7073 9.49644C12.6679 8.98107 12.238 8.63237 11.7578 8.82756C11.3749 8.99757 11.0263 9.23616 10.7292 9.53152C10.409 9.83198 10.238 9.8605 9.78624 9.53152C9.45727 9.29908 9.68755 9.07977 9.80377 8.88897C10.6283 7.54246 12.5363 6.91523 13.9903 7.51173C14.692 7.80342 15.2162 8.27275 15.3061 9.07977C15.4201 10.0008 15.0013 10.6675 14.2754 11.1741C14.0999 11.3057 13.8806 11.4132 13.7205 11.5162Z" fill="white"/>
                                    </svg>
                                    @elseif ($vehicule->air_quality_certificate == 4)
                                    <svg xmlns="http://www.w3.org/2000/svg" class="inline-block -mt-1" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path d="M12 23C18.0751 23 23 18.0751 23 12C23 5.92485 18.0751 1 12 1C5.92485 1 1 5.92485 1 12C1 18.0751 5.92485 23 12 23Z" fill="white"/>
                                        <path d="M12 22.6856C17.9016 22.6856 22.6857 17.9015 22.6857 11.9999C22.6857 6.09835 17.9016 1.31421 12 1.31421C6.09846 1.31421 1.3143 6.09835 1.3143 11.9999C1.3143 17.9015 6.09846 22.6856 12 22.6856Z" fill="#482122"/>
                                        <path d="M11.9999 19.4312C16.1041 19.4312 19.4312 16.1041 19.4312 11.9999C19.4312 7.89571 16.1041 4.56863 11.9999 4.56863C7.89571 4.56863 4.56863 7.89571 4.56863 11.9999C4.56863 16.1041 7.89571 19.4312 11.9999 19.4312Z" fill="#B88A8C"/>
                                        <path d="M12 19.117C15.9306 19.117 19.117 15.9306 19.117 12C19.117 8.0694 15.9306 4.88304 12 4.88304C8.0694 4.88304 4.88304 8.0694 4.88304 12C4.88304 15.9306 8.0694 19.117 12 19.117Z" fill="#623135"/>
                                        <path d="M14.1998 12.9141C14.6378 12.9908 15.0079 13.0499 15.2751 12.6032C15.3255 12.52 15.6496 12.5572 15.827 12.6032C15.8822 12.6396 15.9273 12.6894 15.958 12.748C15.9886 12.8066 16.0038 12.8721 16.0022 12.9382C15.9424 13.2823 15.8515 13.6202 15.7306 13.9478C15.4591 14.6924 15.0605 14.9662 14.2699 14.9114C13.9283 14.8851 13.7881 14.9859 13.7881 15.3144C13.7881 15.4064 13.7728 15.4961 13.7662 15.5881C13.7115 16.4882 13.7071 16.5035 12.8158 16.6087C12.3931 16.659 11.9661 16.6612 11.5434 16.7072C11.1207 16.7532 11.0353 16.5758 11.1054 16.2057C11.2039 15.6253 11.2806 15.0428 11.3747 14.4165C10.6131 14.2506 9.82204 14.2769 9.07309 14.4931C8.89189 14.5726 8.68756 14.5816 8.50003 14.5184C8.31253 14.4552 8.15531 14.3244 8.05912 14.1515C7.80289 13.8011 7.92116 13.4945 8.14454 13.1966C9.4213 11.4074 10.6893 9.63356 11.9901 7.8728C12.1652 7.65917 12.4105 7.51477 12.6822 7.46546C13.2932 7.36255 13.9195 7.35159 14.5393 7.29029C14.8656 7.25741 15.0539 7.40416 15.0517 7.71296C15.0692 8.216 15.0406 8.71961 14.9663 9.21745C14.7649 10.3124 14.5064 11.3856 14.2721 12.4696C14.2415 12.6032 14.2261 12.7499 14.1998 12.9141ZM12.5727 9.08386L12.3822 8.99844L10.0389 12.6973C10.4133 12.6973 10.6236 12.6973 10.8338 12.6973C11.7712 12.7192 11.7821 12.7214 11.9879 11.8213C12.1938 10.9213 12.3822 9.99709 12.5727 9.08386Z" fill="white"/>
                                    </svg>
                                    @elseif ($vehicule->air_quality_certificate == 5)
                                    <svg xmlns="http://www.w3.org/2000/svg" class="inline-block -mt-1" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path d="M12 23C18.0751 23 23 18.0751 23 12C23 5.92485 18.0751 1 12 1C5.92485 1 1 5.92485 1 12C1 18.0751 5.92485 23 12 23Z" fill="white"/>
                                        <path d="M11.9999 22.6856C17.9015 22.6856 22.6856 17.9015 22.6856 11.9999C22.6856 6.09835 17.9015 1.31421 11.9999 1.31421C6.09835 1.31421 1.31421 6.09835 1.31421 11.9999C1.31421 17.9015 6.09835 22.6856 11.9999 22.6856Z" fill="#4F4B48"/>
                                        <path d="M11.9999 19.4312C16.1041 19.4312 19.4312 16.1041 19.4312 11.9999C19.4312 7.89571 16.1041 4.56863 11.9999 4.56863C7.89571 4.56863 4.56863 7.89571 4.56863 11.9999C4.56863 16.1041 7.89571 19.4312 11.9999 19.4312Z" fill="#8A8683"/>
                                        <path d="M12 19.117C15.9306 19.117 19.117 15.9306 19.117 12C19.117 8.0694 15.9306 4.88304 12 4.88304C8.0694 4.88304 4.88304 8.0694 4.88304 12C4.88304 15.9306 8.0694 19.117 12 19.117Z" fill="#625E5E"/>
                                        <path d="M11.124 10.3702C11.8114 10.5322 12.4374 10.6351 13.0438 10.8299C14.9002 11.4341 15.5744 13.2379 14.6046 14.9388C13.5758 16.7361 10.9489 17.2833 9.2742 16.0487C8.96916 15.8451 8.74093 15.5453 8.62592 15.197C8.51088 14.8487 8.51562 14.472 8.63935 14.1267C8.65634 13.9988 8.72155 13.8822 8.82165 13.8008C8.92178 13.7194 9.04919 13.6794 9.17789 13.6888C9.50338 13.6966 9.82739 13.7354 10.1455 13.8049C10.9751 14.0238 11.1087 14.2536 10.9817 15.0943C10.9758 15.2824 10.9927 15.4706 11.032 15.6547C11.2772 15.589 11.5859 15.5956 11.7544 15.4358C12.4331 14.8272 12.6301 12.984 12.1157 12.22C11.9606 12.0008 11.758 11.8196 11.5229 11.6899C11.2878 11.5602 11.0265 11.4855 10.7584 11.4713C10.5395 11.445 10.3206 11.456 10.1017 11.4275C10.0172 11.4202 9.93526 11.3952 9.86111 11.3541C9.78695 11.313 9.72224 11.2568 9.67126 11.189C9.62024 11.1213 9.5841 11.0436 9.56509 10.961C9.54609 10.8784 9.54469 10.7927 9.56096 10.7095C9.76673 9.75285 9.9988 8.80059 10.1958 7.84397C10.2746 7.46527 10.4585 7.36892 10.8416 7.36892C11.8048 7.36892 12.7658 7.28794 13.729 7.28574C14.2005 7.30126 14.6699 7.35618 15.1322 7.44994C15.1966 7.45503 15.2592 7.47384 15.3157 7.5051C15.3722 7.53635 15.4214 7.57937 15.46 7.63118C15.4985 7.68299 15.5256 7.74247 15.5393 7.80562C15.553 7.86874 15.553 7.93406 15.5394 7.99721C15.4429 8.50143 15.3157 8.99928 15.1585 9.48798C15.1366 9.55584 14.8739 9.6281 14.7754 9.58429C13.729 9.10488 12.641 9.38071 11.5705 9.40043C11.4786 9.40043 11.3516 9.53615 11.3101 9.63686C11.2329 9.87719 11.1708 10.1221 11.124 10.3702Z" fill="white"/>
                                        </svg>
                                    @endif
                                </div>            
                                <div>
                                    <span class="font-medium">Consommation :</span> 
                                    <span class="text-gray-700">
                                        @if ($vehicule->consumption)
                                        {{$vehicule->consumption}} L /100 km
                                        @else
                                        donnés non disponsable
                                        @endif
                                    </span>
                                </div>  
                                <div>
                                    <span class="font-medium">Emission de CO2 :</span> 
                                    <span class="text-gray-700">
                                        @if ($vehicule->co2_emission)
                                        {{$vehicule->co2_emission}} g/km
                                        @else
                                        donnés non disponsable
                                        @endif
                                    </span>
                                </div>      
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="mt-6 mb-6">
            <h2 class="text-xl font-semibold">Garantie</h2>
            <div class="mt-4">
                <div><span class="font-medium">Garantie :</span> <span class="text-gray-700">{{$vehicule->guarantee}}</span></div>
            </div>
        </div>
        <hr>
        <div class="mt-6 mb-6">
            <h2 class="text-xl font-semibold">Équipements & options</h2>
            <div class="mt-6">
                <div class="flex flex-col gap-4">
                    @php
                        $groupedByEquipments = $vehicule->options->groupBy('equipment.name');
                    @endphp
                    @foreach ($groupedByEquipments->sortByDesc->count() as $equipemnt => $options)
                    <div class="">
                        <h2 class="text-base font-semibold">{{$equipemnt}}</h2>
                        <ul class="mt-4 flex flex-col gap-2">
                            @foreach ($options as $option)
                            <li><span class="text-gray-700">{{$option->name}}</span></li>
                            @endforeach
                        </ul>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @if ($vehicule->user && $vehicule->user->location != null)
        <hr>
        <div class="mt-6 mb-6">
            <h2 class="text-xl font-semibold">Localisation</h2>
            <div class="mt-6">
                {{-- <iframe title="Localisation" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2740.838340719001!2d0.36411777665595546!3d46.610197656250655!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47fdbc3829722f67%3A0xb518042a2b26ac56!2sSam%20Automobile!5e0!3m2!1sen!2sdz!4v1712930816487!5m2!1sen!2sdz"  class="w-full" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> --}}
                <iframe  title="Localisation"
                class="w-full" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" src="https://maps.google.com/maps?q={{$vehicule->user->location}}&hl=fr&z=14&amp;output=embed">
                </iframe>
            </div>
        </div>
        @endif
        
    </div>
    <div class="lg:w-[35%] w-full">
        <div class="bg-white flex flex-col rounded-[20px] shadow-md overflow-hidden mb-4">
            <div class="bg-white p-6 text-center px-4">
                <h3 class="font-semibold text-xl">{{$vehicule->getName()}}</h3>
                <div class="mt-2">
                    <ul class="text-base flex justify-center divide-x items-center flex-wrap overflow-hidden text-ellipsis">
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
                    <span class="font-semibold underline text-xl">{{number_format($vehicule->price, 0, ' ', ' ')}} €</span>
                </div>
                @if ($vehicule->status == 'available')
                <div class="mt-2">
                    <span class="bg-green-100 text-green-800 text-xs font-bold me-2 px-3 py-1 rounded-full dark:bg-green-900 dark:text-green-300">Disponible</span>
                </div>
                @elseif ($vehicule->status == 'sold')
                <div class="mt-2">
                    <span class="bg-red-100 text-red-800 text-xs font-bold me-2 px-3 py-1 rounded-full dark:bg-red-900 dark:text-red-300">Vendu</span>
                </div>
                @endif
                <div class="mt-4 text-sm">
                    <span>Publiée {{Carbon\Carbon::parse($vehicule->created_at)->diffForHumans()}}</span>
                </div>
                <div class="flex justify-center flex-wrap gap-2 mt-4">
                    <a class="hidden sm:block w-full" href="tel:{{$vehicule->user->phone}}">
                        <button class="bg-primary flex hover:bg-primaryHover w-full items-center justify-center gap-3 font-semibold py-2.5 px-10 rounded-full text-primaryText text-base">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path fill="currentColor" d="M22.25 17c-1.24-1.09-3.38-2.96-4.16-3.38a1.9 1.9 0 0 0-1.69-.07q-.5.23-.85.66a7 7 0 0 1-1.82 1.69c-.42.22-1.98-.68-3.3-1.9l-.41-.41c-1.24-1.32-2.13-2.9-1.9-3.3A8 8 0 0 1 9.8 8.45q.42-.33.65-.82c.25-.55.22-1.17-.07-1.7C9.97 5.15 8.08 3 7 1.78a2.4 2.4 0 0 0-1.02-.68 1.5 1.5 0 0 0-1.18.05C4.23 1.45 2.33 3.4 1.76 4c-.16.16-1.21 1.36-.53 4.28.7 3.07 2.66 6.57 5.04 9.07l.06.07a20.7 20.7 0 0 0 9.42 5.36q.88.2 1.79.22c1.65 0 2.35-.64 2.47-.77.6-.57 2.54-2.47 2.84-3.05.18-.36.2-.8.05-1.18a2.4 2.4 0 0 0-.65-1m-.38 1.64q-1.23 1.47-2.63 2.77c-.08.06-.96.76-3.21.24a20 20 0 0 1-8.58-4.76 20 20 0 0 1-5.1-8.86c-.51-2.25.18-3.14.24-3.21Q3.9 3.4 5.35 2.18q.15-.03.3.03.3.1.51.35A41 41 0 0 1 9.39 6.5q.16.34 0 .7a1 1 0 0 1-.32.4 9 9 0 0 0-1.96 2.17c-.78 1.4 1.38 3.9 2.06 4.63.2.23.45.46.46.47.74.67 3.25 2.83 4.64 2.06a9 9 0 0 0 2.16-1.97q.16-.21.4-.32.36-.15.7.02c.58.3 2.42 1.87 3.95 3.22q.24.21.35.52.06.12.04.26z"></path></svg>
                            <span>{{$vehicule->user->phone}}</span>
                        </button>
                    </a>
                    @if ($vehicule->user)
                    <a class="block w-full" href="https://wa.me/{{$vehicule->user->phone}}">
                        <button class="bg-[#25d366] hover:bg-[#128c7e] w-full flex items-center justify-center gap-3 font-semibold py-2.5 px-10 rounded-full text-primaryText text-base tracking-widest">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232"/>
                              </svg>
                            <span>WhatsApp</span>
                        </button>
                    </a>
                    @endif
                </div>
            </div>
        </div>
        <div class="bg-white flex flex-col rounded-[20px] shadow-md overflow-hidden mb-4">
            <div class="bg-white p-6 text-center px-4">
                <h3 class="font-semibold text-xl">Les enchères</h3>
                @if ($vehicule->status == 'available')
                    <button type="button" x-data="" x-on:click="$dispatch('open-modal', 'make-offer-modal')" class="bg-green-500 hover:bg-green-400 w-full flex items-center justify-center gap-3 font-semibold py-2.5 px-10 mt-4 rounded-full text-primaryText text-base">
                        <span>Place un offre</span>
                    </button>
                @endif
                <livewire:auctions :vehicule="$vehicule"></livewire:auctions>
            </div>
        </div>
        <x-modal name="make-offer-modal" focusable>
            @auth
            <form id="make-offer-form" method="post" action="{{ route('vehicule.auction', $vehicule->id) }}" class="p-6">
                @csrf
    
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    Ajoutez le prix de votre offre
                </h2>
                @if ($vehicule->auctions->isNotEmpty())
                <p>Le dernier prix d'enchère est <span class="font-bold">{{number_format($vehicule->auctions->max('price'), 0 , ' ', ' ')}}</span> € Votre prix doit être supérieur à ce prix</p>
                @else
                <p>Ajouter le premier prix d'enchère pour ce véhicule</p>
                @endif
                
                <div class="mt-6">
                    <x-input-label for="price" value="Le prix de votre offre" class="sr-only" />

                    <x-text-input
                        id="price"
                        name="price"
                        type="number"
                        class="mt-1 block w-full"
                        placeholder="Le prix de votre offre"
                        required="required"
                        min="{{$vehicule->auctions->isNotEmpty()?$vehicule->auctions->max('price'):''}}"
                    />
    
                </div>
                <div class="mt-6">
                    <x-input-label for="phone" value="Téléphone" class="sr-only" />

                    <x-text-input
                        id="phone"
                        name="phone"
                        type="text"
                        class="mt-1 block w-full"
                        placeholder="Téléphone"
                        value="{{auth()->user()->phone}}"
                        required="required"
                    />
    
                </div>
    
                <div class="mt-6 flex justify-end">
                    <x-secondary-button x-on:click="$dispatch('close')">
                        Annuler
                    </x-secondary-button>
    
                    <x-primary-button class="ms-3">
                        Ajouter
                    </x-primary-button>
                </div>
            </form>
            @else
            <div class="p-6"><a class="font-semibold text-primary" href="{{route('register')}}">Créez un compte</a> ou <a class="font-semibold text-primary" href="{{route('login')}}">connectez-vous</a> si vous avez un compte afin de soumettre le prix de l'enchère.</div>
            @endauth
           
        </x-modal>
    </div>
</div>
@if ($similarVehicules->isNotEmpty())
<hr class="mb-10">
<div class="mb-20">
    <h2 class="lg:text-2xl text-xl font-bold">Annonces similaires</h2>
    <div class="mt-6">
        <div class="grid lg:grid-cols-4 grid-cols-1 overflow-x-auto relative gap-4">
            @foreach ($similarVehicules as $similarVehicule)
                <x-home.vehicule-show-box :vehicule="$similarVehicule"></x-home.vehicule-show-box>
            @endforeach
        </div>
    </div>
</div>
@endif
<div class="fixed bottom-0 inset-x-0 bg-white py-2 px-4 sm:hidden z-30">
    <div class="flex justify-center">
        <a class="block w-full" href="tel:{{$vehicule->user->phone}}">
            <button class="bg-primary hover:bg-primaryHover w-full flex items-center justify-center gap-3 font-semibold py-2.5 px-10 rounded-full text-primaryText text-base">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path fill="currentColor" d="M22.25 17c-1.24-1.09-3.38-2.96-4.16-3.38a1.9 1.9 0 0 0-1.69-.07q-.5.23-.85.66a7 7 0 0 1-1.82 1.69c-.42.22-1.98-.68-3.3-1.9l-.41-.41c-1.24-1.32-2.13-2.9-1.9-3.3A8 8 0 0 1 9.8 8.45q.42-.33.65-.82c.25-.55.22-1.17-.07-1.7C9.97 5.15 8.08 3 7 1.78a2.4 2.4 0 0 0-1.02-.68 1.5 1.5 0 0 0-1.18.05C4.23 1.45 2.33 3.4 1.76 4c-.16.16-1.21 1.36-.53 4.28.7 3.07 2.66 6.57 5.04 9.07l.06.07a20.7 20.7 0 0 0 9.42 5.36q.88.2 1.79.22c1.65 0 2.35-.64 2.47-.77.6-.57 2.54-2.47 2.84-3.05.18-.36.2-.8.05-1.18a2.4 2.4 0 0 0-.65-1m-.38 1.64q-1.23 1.47-2.63 2.77c-.08.06-.96.76-3.21.24a20 20 0 0 1-8.58-4.76 20 20 0 0 1-5.1-8.86c-.51-2.25.18-3.14.24-3.21Q3.9 3.4 5.35 2.18q.15-.03.3.03.3.1.51.35A41 41 0 0 1 9.39 6.5q.16.34 0 .7a1 1 0 0 1-.32.4 9 9 0 0 0-1.96 2.17c-.78 1.4 1.38 3.9 2.06 4.63.2.23.45.46.46.47.74.67 3.25 2.83 4.64 2.06a9 9 0 0 0 2.16-1.97q.16-.21.4-.32.36-.15.7.02c.58.3 2.42 1.87 3.95 3.22q.24.21.35.52.06.12.04.26z"></path></svg>
                <span>{{$vehicule->user?$vehicule->user->phone:''}}</span>
            </button>
        </a>
    </div>
</div>
@endsection
@section('top-scripts')
   
@endsection