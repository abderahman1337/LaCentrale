@extends('layouts.home')
@section('title', 'Voiture occasion - Annonce auto')
@section('content')
<div class="bg-[#f6f6f9] rounded-[32px] lg:ltr:pr-0 lg:p-8 p-4 lg:rtl:pl-0 min-h-[480px]" id="home-search-box">
    <div class="grid sm:grid-cols-3 gap-10">
        <div class="p-6 rounded-[32px] bg-white shadow-md lg:w-[400px]">
            <h2 class="text-2xl font-bold text-center mt-4">Filtrer les véhicules</h2>
            <div class="flex items-center justify-center">
                <form action="{{route('vehicules.listing')}}" method="get">
                    <div class="w-full">
                        <div class="mt-6 flex items-start lg:gap-4 gap-2 w-full">
                            <!-- Brand -->
                            <div class="w-full">
                                <button id="brand-search-dropdown" data-dropdown-toggle="brands-dropdown" data-dropdown-placement="bottom" class="text-gray-600 border bg-transparent focus:ring-1 focus:outline-none focus:ring-indigo-300 w-full relative rounded-lg text-sm px-2 py-2.5 text-center inline-flex items-center justify-between" type="button">
                                    <input type="text" class="border-none outline-none px-0 text-sm focus:ring-0 cursor-pointer w-full h-4 text-gray-900" readonly value="" placeholder="Marque">
                                    <input type="hidden" id="selected-brands-list" name="brands" value="">
                                    <svg class="w-5 h-5 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7"/>
                                    </svg>
                                </button>
                                <div id="brands-dropdown" class="z-10 hidden bg-white rounded-lg shadow w-60 dark:bg-gray-700">
                                    <div class="p-3">
                                        <label for="brand-search" class="sr-only">Search</label>
                                        <div class="relative">
                                            <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                                                <svg class="w-3 h-3 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                                </svg>
                                            </div>
                                            <input type="text" id="brand-search" class="block w-full placeholder:text-xs p-2 ps-8 text-sm text-gray-900 border border-gray-300 rounded-md bg-white focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500" placeholder="Rechercher une marque">
                                        </div>
                                    </div>
                                    <ul id="brands-list" class="max-h-48 px-3 pb-3 overflow-y-auto text-sm text-gray-700 dark:text-gray-200" aria-labelledby="brand-search-dropdown">
                                        @foreach (App\Models\Brand::latest()->get() as $brand)
                                        <li data-name="{{$brand->name}}">
                                            <div class="flex items-center ps-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                            <input id="brand-{{$brand->id}}" type="checkbox" data-name="{{$brand->name}}" value="{{$brand->id}}" class="w-4 h-4 text-indigo-600 bg-white border-gray-300 rounded focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                            <label for="brand-{{$brand->id}}" class="w-full py-2 ms-2 text-xs font-medium text-gray-900 rounded dark:text-gray-300">{{$brand->name}}</label>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <!-- Models -->
                            <div class="w-full">
                                <button id="model-search-dropdown" data-dropdown-toggle="models-dropdown" data-dropdown-placement="bottom" class="text-gray-600 border bg-transparent focus:ring-1 focus:outline-none focus:ring-indigo-300 w-full rounded-lg text-sm px-2 py-2.5 text-center inline-flex items-center justify-between" type="button">
                                    <input type="text" class="border-none outline-none px-0 text-sm focus:ring-0 cursor-pointer w-full h-4 text-gray-900" readonly value="" placeholder="Modèles">
                                    <input type="hidden" id="selected-models-list" name="models" value="">
                                    <svg class="w-5 h-5 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7"/>
                                    </svg>
                                </button>
                                <div id="models-dropdown" class="z-10 hidden bg-white rounded-lg shadow w-60 dark:bg-gray-700">
                                    <div class="p-3">
                                        <label for="model-search" class="sr-only">Search</label>
                                        <div class="relative">
                                            <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                            </svg>
                                            </div>
                                            <input type="text" id="model-search" class="block w-full placeholder:text-xs p-2 ps-8 text-sm text-gray-900 border border-gray-300 rounded-md bg-white focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500" placeholder="Rechercher une model">
                                        </div>
                                    </div>
                                    <ul id="models-list" class="max-h-48 px-3 pb-3 overflow-y-auto text-sm text-gray-700 dark:text-gray-200" aria-labelledby="model-search-dropdown">
                                        @foreach (App\Models\Serie::latest()->get() as $type)
                                        <li data-name="{{$type->name}}">
                                            <div class="flex items-center ps-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                            <input id="model-{{$type->id}}" type="checkbox" data-name="{{$type->name}}" value="{{$type->id}}" class="w-4 h-4 text-indigo-600 bg-white border-gray-300 rounded focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                            <label for="model-{{$type->id}}" class="w-full py-2 ms-2 text-xs font-medium text-gray-900 rounded dark:text-gray-300">{{$type->name}}</label>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 flex items-start lg:gap-4 gap-2 w-full">
                            <!-- Price -->
                            <div class="w-full">
                                <button data-dropdown-toggle="prices-dropdown" data-dropdown-placement="bottom" class="text-gray-600 border bg-transparent focus:ring-1 focus:outline-none focus:ring-indigo-300 w-full rounded-lg text-sm px-2 py-2.5 text-center inline-flex items-center justify-between" type="button"> 
                                    <input type="text" class="border-none outline-none px-0 text-sm focus:ring-0 cursor-pointer w-full h-4 text-gray-900" id="price-range" readonly value="" placeholder="Prix">
                                    <svg class="w-5 h-5 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7"/>
                                    </svg>
                                </button>
                                <div id="prices-dropdown" class="z-10 hidden bg-white rounded-lg shadow w-60 dark:bg-gray-700">
                                    <div class="p-3 flex items-start gap-2">
                                        <div class="relative">
                                            <input type="number" id="min-price" name="min_price" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-indigo-500 focus:outline-none focus:ring-0 focus:border-indigo-600 peer" placeholder=" " />
                                            <label for="min-price" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-indigo-600 peer-focus:dark:text-indigo-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Prix min</label>
                                        </div>
                                        <div class="relative">
                                            <input type="number" id="max-price" name="max_price" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-indigo-500 focus:outline-none focus:ring-0 focus:border-indigo-600 peer" placeholder=" " />
                                            <label for="max-price" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-indigo-600 peer-focus:dark:text-indigo-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Prix max</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Energie -->
                            <div class="w-full">
                                <button id="energy-search-dropdown" data-dropdown-toggle="energy-dropdown" data-dropdown-placement="bottom" class="text-gray-600 border bg-transparent focus:ring-1 focus:outline-none focus:ring-indigo-300 w-full rounded-lg text-sm px-2 py-2.5 text-center inline-flex items-center justify-between" type="button">
                                    <input type="text" class="border-none outline-none px-0 text-sm focus:ring-0 cursor-pointer w-full h-4 text-gray-900" readonly value="" placeholder="Énergie">
                                    <input type="hidden" id="selected-energies-list" name="energies" value="">
                                    <svg class="w-5 h-5 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7"/>
                                    </svg>
                                </button>
                                <div id="energy-dropdown" class="z-10 hidden bg-white rounded-lg shadow w-60 dark:bg-gray-700">
                                    <ul id="energies-list" class="max-h-96 px-3 pb-3 overflow-y-auto text-sm text-gray-700 dark:text-gray-200" aria-labelledby="energy-search-dropdown">
                                        @foreach ($energies as $energy)
                                        <li data-name="{{$energy->name}}">
                                            <div class="flex items-center ps-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                            <input id="energy-{{$energy->id}}" type="checkbox" data-name="{{$energy->name}}" value="{{$energy->id}}" class="w-4 h-4 text-indigo-600 bg-white border-gray-300 rounded focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                            <label for="energy-{{$energy->id}}" class="w-full py-2 ms-2 text-xs font-medium text-gray-900 rounded dark:text-gray-300">{{$energy->name}}</label>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 flex items-start gap-4 w-full">
                            <div class="w-full relative">
                                <button data-dropdown-toggle="location-dropdown" data-dropdown-placement="bottom" class="text-gray-600 border bg-transparent focus:ring-1 focus:outline-none focus:ring-indigo-300 w-full rounded-lg text-sm px-2 py-2.5 text-center inline-flex items-center justify-between" type="button"> 
                                    <span>Localisation</span>
                                    <svg class="w-5 h-5 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7"/>
                                    </svg>
                                </button>
                                <div id="location-dropdown" class="z-10 hidden bg-white rounded-lg shadow w-full dark:bg-gray-700">
                                    <div class="p-3">
                                        <label for="location-search" class="sr-only">Search</label>
                                        <div class="relative">
                                            <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                            </svg>
                                            </div>
                                            <input type="text" id="location-search" class="block w-full placeholder:text-xs p-2 ps-8 text-sm text-gray-900 border border-gray-300 rounded-md bg-white focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500" placeholder="Code Postal">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 flex justify-center">
                            <button type="submit" class="bg-primary font-semibold py-3 px-6 lg:min-w-72 w-full lg:w-max rounded-full text-white text-base"> Rechercher @if($vehiculesCount > 0) ({{number_format($vehiculesCount, 0, ' ', ' ')}}) @endif</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="justify-end w-full lg:col-span-2 lg:ltr:pl-20 lg:rtl:pr-20">
            <h2 class="sm:text-4xl text-xl mb-6 font-bold">Nous sélectionnons les meilleures voitures d'occasion pour vous.</h2>
            <img class="ltr:ml-auto rtl:mr-auto" src="https://www.lacentrale.fr/fragments/recherche-fragment-front/media/claims_landing_search_desktop.a7bae0d0.png" alt="">
        </div>
    </div>
</div>
<div class="mt-20 mb-20">
    <h2 class="lg:text-3xl text-xl font-bold">Trouvez votre voiture d'occasion idéale</h2>
    <div class="mt-6">
        <div class="grid lg:grid-cols-5 grid-cols-2 overflow-x-auto relative gap-4">
            <a href="http://">
                <div class="bg-white flex flex-col rounded-[20px] shadow-md overflow-hidden mb-2">
                    <div class="py-6">
                        <img src="https://lacentrale.fr/static/fragment-landing/media/reco_petits_prix.5a9b23a2.png" alt="">
                    </div>
                    <div class="bg-[#f6f6f9] py-4 px-4">
                        <h3 class="font-semibold">Petites prix</h3>
                        <span class="text-sm font-medium text-gray-600">32 946 véhicules</span>
                    </div>
                </div>
            </a>
            <a href="http://">
                <div class="bg-white flex flex-col rounded-[20px] shadow-md overflow-hidden mb-2">
                    <div class="py-6">
                        <img src="https://lacentrale.fr/static/fragment-landing/media/reco_familiales.f1ab8b21.png" alt="">
                    </div>
                    <div class="bg-[#f6f6f9] py-4 px-4">
                        <h3 class="font-semibold">Familiales</h3>
                        <span class="text-sm font-medium text-gray-600">35 794 véhicules</span>
                    </div>
                </div>
            </a>
            <a href="http://">
                <div class="bg-white flex flex-col rounded-[20px] shadow-md overflow-hidden mb-2">
                    <div class="py-6">
                        <img src="https://lacentrale.fr/static/fragment-landing/media/reco_electriques.968e39af.png" alt="">
                    </div>
                    <div class="bg-[#f6f6f9] py-4 px-4">
                        <h3 class="font-semibold">Électriques</h3>
                        <span class="text-sm font-medium text-gray-600">26 219 véhicules</span>
                    </div>
                </div>
            </a>
            <a href="http://">
                <div class="bg-white flex flex-col rounded-[20px] shadow-md overflow-hidden mb-2">
                    <div class="py-6">
                        <img src="https://lacentrale.fr/static/fragment-landing/media/reco_hybrides.d570f580.png" alt="">
                    </div>
                    <div class="bg-[#f6f6f9] py-4 px-4">
                        <h3 class="font-semibold">Hybrides</h3>
                        <span class="text-sm font-medium text-gray-600">42 542 véhicules</span>
                    </div>
                </div>
            </a>
            <a href="http://">
                <div class="bg-white flex flex-col rounded-[20px] shadow-md overflow-hidden mb-2">
                    <div class="py-6">
                        <img src="https://lacentrale.fr/static/fragment-landing/media/reco_automatiques.581d042f.png" alt="">
                    </div>
                    <div class="bg-[#f6f6f9] py-4 px-4">
                        <h3 class="font-semibold">Automatiques</h3>
                        <span class="text-sm font-medium text-gray-600">190 644 véhicules</span>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
<div class="mt-20 mb-20">
    <div class="grid sm:grid-cols-2 grid-cols-1">
        <div>
            <img src="https://lacentrale.fr/static/fragment-landing/media/usp_index.5b88ddd5.png" alt="">
        </div>
        <div>
            <h2 class="lg:text-3xl text-xl font-bold">Notre expertise à votre service</h2>
            <div class="mt-4">
                <ul class="flex flex-col gap-3 font-medium">
                    <li class="flex items-center gap-3">
                        <div class="h-[42px] w-[42px] flex items-center justify-center rounded-full bg-primaryLight text-primary flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" width="24" height="24" fill="none" viewBox="0 0 24 24"><path fill="currentColor" d="m8.85 13.54-2.59-3.02a.7.7 0 0 0-1.12.08l-4.03 6.46a.7.7 0 1 0 1.17.74l3.54-5.68 2.6 3.04a.7.7 0 0 0 1.12-.09l3.6-5.84.74 1.12a7 7 0 0 1 1.44-.35l-1.64-2.44a.7.7 0 0 0-1.16.02zM18.58 10.4l4.31-6.8a.7.7 0 1 0-1.17-.74l-4.54 7.17a6 6 0 0 1 1.4.36"></path><path fill="currentColor" fill-rule="evenodd" d="M20.48 15.37q-.02 1.33-.71 2.4l2.53 2.53a.68.68 0 0 1-.96.96l-2.5-2.49a4.36 4.36 0 1 1 1.64-3.4m-7.35 0a3 3 0 1 0 5.99 0 3 3 0 0 0-5.99 0" clip-rule="evenodd"></path></svg>
                        </div>
                        <span>Une analyse objective des prix</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <div class="h-[42px] w-[42px] flex items-center justify-center rounded-full bg-primaryLight text-primary flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" width="24" height="24" fill="none" viewBox="0 0 24 24"><path fill="currentColor" d="M9.72 2.6a.73.73 0 1 0 0 1.45.73.73 0 0 0 0-1.46"></path><path fill="currentColor" fill-rule="evenodd" d="M11.88 2.5a2.4 2.4 0 0 0-1.27-1.3 2.2 2.2 0 0 0-1.82 0q-.86.4-1.27 1.31h-.36a1.6 1.6 0 0 0-1.54 1.24H2.69c-.32 0-.65.14-.85.38-.24.2-.37.52-.37.85v16.75c0 .33.13.66.38.86q.33.36.84.37h9.68c.3 0 .52-.23.52-.52a.5.5 0 0 0-.18-.36.6.6 0 0 0-.34-.12H2.7a.22.22 0 0 1-.22-.23V4.98q.02-.21.22-.23h2.87v.47q.01.38.25.6c.15.16.4.26.6.26H13q.38-.01.6-.25c.16-.16.25-.4.25-.6v-.48h2.88q.2.02.22.23v6.12c0 .29.23.52.52.52s.52-.23.52-.52V4.98c0-.33-.13-.66-.38-.86a1.2 1.2 0 0 0-.84-.37h-2.89q-.14-.52-.53-.87a1.6 1.6 0 0 0-1-.37h-.44zm-2.75-.33c.37-.19.82-.18 1.14 0q.59.3.71.93l.06.41h1.17q.27 0 .42.19.17.22.17.45v.97H6.56V4.1q0-.24.17-.44.16-.16.43-.16h1.2l.06-.41q.14-.63.7-.93" clip-rule="evenodd"></path><path fill="currentColor" d="M14.22 8.72H4.2v.91h10.02zM19.27 16.07q.17 0 .3.15.11.14.14.3a.4.4 0 0 1-.11.35l-2.61 2.73a.5.5 0 0 1-.36.14.5.5 0 0 1-.35-.14l-1.05-1.09-.01-.02c-.1-.2-.12-.48.07-.67l.02-.01.02-.01v-.01q.13-.08.31-.1.19.02.3.1h.02l.02.02.7.73 2.26-2.38.01-.01q.14-.1.32-.08"></path><path fill="currentColor" fill-rule="evenodd" d="M17.46 12.86a5.06 5.06 0 1 0-.02 10.16 5.06 5.06 0 0 0 .02-10.16M14.6 15c.76-.76 1.8-1.2 2.87-1.2a4.08 4.08 0 0 1 0 8.15A4.08 4.08 0 0 1 14.6 15" clip-rule="evenodd"></path><path fill="currentColor" d="M11.73 13.31H4.2v.92h7.53zM10.5 17.86H4.2v.92h6.3z"></path></svg>
                        </div>
                        <span>Une visibilité complète sur l'historique du véhicule</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <div class="h-[42px] w-[42px] flex items-center justify-center rounded-full bg-primaryLight text-primary flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" width="24" height="24" fill="none" viewBox="0 0 24 24"><path fill="currentColor" fill-rule="evenodd" d="M18.95 1c1.22 0 2.22.94 2.3 2.14l.01.18v17.36c0 1.23-.94 2.23-2.14 2.31l-.17.01H5.05a2.3 2.3 0 0 1-2.3-2.14l-.01-.18V3.32c0-1.23.94-2.23 2.14-2.31L5.05 1zm0 2.32H5.05v17.36h13.9zM9.1 16.05a1.74 1.74 0 1 1 0 3.48 1.74 1.74 0 0 1 0-3.48m5.78 0a1.74 1.74 0 1 1 0 3.48 1.74 1.74 0 0 1 0-3.48m-5.78-4.63a1.74 1.74 0 1 1 0 3.47 1.74 1.74 0 0 1 0-3.47m5.78 0a1.74 1.74 0 1 1 0 3.47 1.74 1.74 0 0 1 0-3.47m1.16-6.95c.9 0 1.65.7 1.73 1.57v2.49c0 .9-.68 1.64-1.56 1.73H7.95c-.9 0-1.65-.69-1.73-1.57l-.01-.16V6.2c0-.9.69-1.64 1.57-1.73h8.27m-.58 2.32H8.53v1.16h6.94z" clip-rule="evenodd"></path></svg>
                        </div>
                        <span>Votre budget maîtrisé avec notre simulateur de financement</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <div class="h-[42px] w-[42px] flex items-center justify-center rounded-full bg-primaryLight text-primary flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" width="24" height="24" fill="none" viewBox="0 0 24 24"><path fill="currentColor" d="m20.69 15.93-.7-.62c-.03-.04-.07-.12-.05-.16.16-.38.3-.78.52-1.12s.6-.48 1.03-.51c.4-.03.55-.18.55-.6v-1.8c0-.42-.14-.56-.55-.6a1.5 1.5 0 0 1-1.34-1.01q-.27-.7-.6-1.41a1.5 1.5 0 0 1 .22-1.7c.28-.33.27-.52-.04-.83l-1.25-1.24c-.33-.32-.5-.33-.86-.05a1.5 1.5 0 0 1-1.66.21l-1.4-.59a1.5 1.5 0 0 1-1.04-1.36c-.03-.38-.18-.53-.58-.53H11.1c-.4 0-.55.15-.58.56a1.5 1.5 0 0 1-.96 1.3l-1.5.62a1.5 1.5 0 0 1-1.64-.22c-.35-.29-.53-.28-.86.04L4.3 5.55c-.3.32-.32.5-.05.83q.63.77.21 1.7-.3.68-.58 1.38-.35.96-1.38 1.04c-.37.03-.52.19-.52.56v1.87c0 .39.15.53.55.57q.98.09 1.34 1.01.27.7.6 1.41a1.5 1.5 0 0 1-.22 1.7c-.28.33-.27.51.04.82l1.27 1.26c.3.3.5.31.8.04q.82-.66 1.75-.2.67.32 1.35.56.94.36 1.03 1.36c.03.38.19.53.58.53h1.84c.4 0 .54-.15.58-.56q.09-.95.97-1.3c.73-.29.73-.28 1.24.3l.18.22q-.5.2-.95.36c-.29.1-.43.27-.45.6A1.45 1.45 0 0 1 13.04 23h-2.06a1.45 1.45 0 0 1-1.47-1.4c-.02-.32-.16-.48-.44-.58l-1.38-.57q-.37-.17-.7.08c-.7.57-1.48.53-2.13-.1l-1.32-1.34c-.6-.62-.65-1.42-.09-2.07q.28-.34.1-.7-.3-.69-.58-1.39-.13-.41-.57-.43A1.46 1.46 0 0 1 1 13.02v-2.03c0-.81.58-1.43 1.4-1.48.31-.02.47-.17.58-.46q.26-.69.56-1.36c.12-.27.11-.48-.09-.72-.56-.66-.53-1.45.08-2.07l1.35-1.35c.64-.62 1.44-.65 2.12-.09q.31.26.69.1.7-.32 1.4-.59.4-.13.42-.55C9.56 1.6 10.17 1.01 11 1h2.03c.8.01 1.41.59 1.46 1.38q.02.46.44.6.7.26 1.38.57.37.18.7-.08c.67-.56 1.47-.52 2.1.1q.68.65 1.36 1.34c.6.62.64 1.41.08 2.08q-.28.33-.1.72.3.67.57 1.36c.1.29.27.44.59.46.8.05 1.38.67 1.39 1.48v2.03a1.45 1.45 0 0 1-1.4 1.47q-.45.02-.57.43l-.37.98z"></path><path fill="currentColor" d="m10.14 11.56 1.42-1.43-1.01-1.01c-.44-.44-.35-.83.24-1.01a4 4 0 0 1 5.08 4.5c-.05.25 0 .4.2.57l4.25 3.77q1.09.99.72 2.41-.38 1.38-1.78 1.7a2.3 2.3 0 0 1-2.34-.79q-1.87-2.1-3.75-4.23c-.16-.19-.3-.22-.53-.18a4 4 0 0 1-4.5-5.13c.17-.51.56-.61.94-.24zm-1.11.28-.08.04c.02.2 0 .43.05.63a3 3 0 0 0 3.81 2.29q.47-.16.77.22.28.34.58.66l3.5 3.95c.62.7 1.64.66 2.18-.05.45-.59.35-1.39-.26-1.93q-2.25-2-4.52-4c-.29-.25-.38-.5-.26-.87a2.96 2.96 0 0 0-2.01-3.7c-.3-.1-.61-.1-.94-.15l.01.1.7.7c.3.32.3.56 0 .87l-1.97 1.97c-.3.3-.55.3-.86 0l-.71-.72z"></path><path fill="currentColor" d="M19.08 14.51q-.4-.31-.7-.62c-.07-.08-.06-.26-.03-.4q.63-2.83-1-5.22a6.5 6.5 0 0 0-11.81 2.89 6.52 6.52 0 0 0 6.85 7.36c.41-.02.82-.13 1.23-.18q.17-.01.27.05.3.33.6.68a7.4 7.4 0 0 1-8.4-2.39A7.54 7.54 0 0 1 16.13 5.71a7.5 7.5 0 0 1 2.94 8.8M19.16 18.64a.5.5 0 0 0-.5-.49.5.5 0 1 0 .5.5"></path><path fill="currentColor" d="M19.16 18.65a.5.5 0 0 1-.5.5.5.5 0 0 1-.5-.48.5.5 0 0 1 .5-.52.5.5 0 0 1 .48.5z"></path></svg>
                        </div>
                        <span>Une projection claire sur les futurs entretiens de votre voiture</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="mb-20"><x-home.most-popular-brands :brands="$brands"></x-home.most-popular-brands></div>
<div class="mb-20"><x-home.most-requested-models :models="$models"></x-home.most-requested-models></div>
<div class="mt-20 mb-20">
    <h2 class="lg:text-3xl text-xl font-bold">Notre sélection de véhicules d’occasion</h2>
    <div class="mt-6">
        <div class="grid lg:grid-cols-4 grid-cols-1 overflow-x-auto relative gap-4">
            @foreach ($vehicules as $vehicule)
                <x-home.vehicule-show-box :vehicule="$vehicule"></x-home.vehicule-show-box>
            @endforeach
        </div>
    </div>
</div>

<div class="mt-20 mb-10">
    <h2 class="lg:text-3xl text-xl font-bold">A découvrir également</h2>
    <div class="bg-[#f6f6f9] p-6 rounded-[20px] mt-6">
        <div class="grid lg:grid-cols-4 sm:grid-cols-2 grid-cols-1 gap-4">
            <div>
                <h2 class="font-semibold">Marques de véhicules d'occasion</h2>
                <div class="mt-3">
                    <ul class="text-sm font-semibold">
                        @foreach (App\Models\Brand::latest()->limit(8)->get() as $brand)
                        <li><a class="underline" href="{{route('vehicules.listing', ['brands' => $brand->id])}}">{{$brand->name}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div>
                <h2 class="font-semibold">Modèles de véhicules d'occasion</h2>
                <div class="mt-3">
                    <ul class="text-sm font-semibold">
                        @foreach (App\Models\Serie::latest()->with('brand')->limit(8)->get() as $serie)
                        <li><a class="underline" href="{{route('vehicules.listing', ['models' => $serie->id])}}">{{$serie->brand->name}} {{$serie->name}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div>
                <h2 class="font-semibold">Catégories de véhicules</h2>
                <div class="mt-3">
                    <ul class="text-sm font-semibold">
                        @foreach (App\Models\Category::latest()->limit(8)->get() as $category)
                        <li><a class="underline" href="{{route('vehicules.listing', ['categories' => $category->id])}}">{{$category->name}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div>
                <h2 class="font-semibold">Énergie des véhicules</h2>
                <div class="mt-3">
                    <ul class="text-sm font-semibold">
                        @foreach (App\Models\Energy::latest()->limit(8)->get() as $energy)
                        <li><a class="underline" href="{{route('vehicules.listing', ['energies' => $energy->id])}}">{{$energy->name}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    let brandList = document.getElementById('brands-list'); 
    let modelList = document.getElementById('models-list'); 
    let energyList = document.getElementById('energies-list'); 
    let maxPrice = document.getElementById('max-price');
    let minPrice = document.getElementById('min-price');
    let priceRange = document.getElementById('price-range');
    listFilterByName(document.getElementById('brand-search'), brandList);
    listFilterByName(document.getElementById('model-search'), modelList);

    minPrice.addEventListener('input', function (){
        let value = this.value;
        let max = maxPrice.value;
        priceRange.value = (value != '' ? value + '€'  + (max != '' ? ' - ' : '') : '') + (max != '' ?  max + '€' : '');
    });
    maxPrice.addEventListener('input', function (){
        let value = this.value;
        let min = minPrice.value;
        priceRange.value = (min != '' ? min + '€ ' : '') + (value != '' ? (min != '' ? ' - ' : '') + value + '€' : '');
    });

    let brandSearchDropdownBtn = document.getElementById('brand-search-dropdown');
    brandList.querySelectorAll('li').forEach(item => {
        let input = item.querySelector('input[type="checkbox"]');
        input.addEventListener('change', function (){
            let checkedBrands = brandList.querySelectorAll('li input[type="checkbox"]:checked');
            brandSearchDropdownBtn.querySelector('input').value = '';
            var names = [];
            var ids = [];
            checkedBrands.forEach(checkedBrand => {
                names.push(checkedBrand.dataset.name);
                ids.push(checkedBrand.value);
            });
            brandSearchDropdownBtn.querySelector('input').value = names.join(', ');
            brandSearchDropdownBtn.querySelector('#selected-brands-list').value = ids.join(',');
        });
    });

    
    let modelSearchDropdownBtn = document.getElementById('model-search-dropdown');
    modelList.querySelectorAll('li').forEach(item => {
        let input = item.querySelector('input[type="checkbox"]');
        input.addEventListener('change', function (){
            let checkedModels = modelList.querySelectorAll('li input[type="checkbox"]:checked');
            modelSearchDropdownBtn.querySelector('input').value = '';
            var names = [];
            var ids = [];
            checkedModels.forEach(checkedModel => {
                names.push(checkedModel.dataset.name);
                ids.push(checkedModel.value);
            });
            modelSearchDropdownBtn.querySelector('input').value = names.join(', ');
            modelSearchDropdownBtn.querySelector('#selected-models-list').value = ids.join(',');
        });
    });

    let energiesSearchDropdownBtn = document.getElementById('energy-search-dropdown');
    energyList.querySelectorAll('li').forEach(item => {
        let input = item.querySelector('input[type="checkbox"]');
        input.addEventListener('change', function (){
            let checkedEnergies = energyList.querySelectorAll('li input[type="checkbox"]:checked');
            energiesSearchDropdownBtn.querySelector('input').value = '';
            var names = [];
            var ids = [];
            checkedEnergies.forEach(checkedEnergy => {
                names.push(checkedEnergy.dataset.name);
                ids.push(checkedEnergy.value);
            });
            energiesSearchDropdownBtn.querySelector('input').value = names.join(', ');
            energiesSearchDropdownBtn.querySelector('#selected-energies-list').value = ids.join(',');
        });
    });
</script>
@endsection