@extends('layouts.admin')
@section('title', 'Les véhicules')
@section('content')
<div>
    <div class="flex items-center justify-between">
        <h2 class="lg:text-2xl text-xl font-bold">Les véhicules</h2>
        <div class="flex items-center gap-2">
            <button type="button" x-data="" x-on:click="$dispatch('open-modal', 'filter-vehicules')" class="block text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800" type="button">
                Filtre
            </button>
            <a href="{{route('admin.vehicules.create')}}">
                <button class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                    Ajouter
                </button>
            </a>
        </div>
    </div>
    <div class="mt-6">
        <x-modal name="filter-vehicules" focusable>
            <form method="get" action="{{ route('admin.vehicules.index') }}" class="p-6">
                <div class="dropdown-container">
                    <div class="flex items-center gap-2 justify-between button">
                        <h2 class="font-semibold text-base">Marques/Modèles</h2>
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5"/>
                        </svg>
                    </div>
                    <div class="mt-4 dropdown active">
                        <div class="flex flex-col gap-3">
                            <div class="w-full relative">
                                <button id="category-search-dropdown" data-dropdown-toggle="categories-dropdown" data-dropdown-placement="bottom" class="text-gray-600 border bg-transparent focus:ring-1 focus:outline-none focus:ring-indigo-300 w-full relative rounded-lg text-sm px-2 py-2.5 text-center inline-flex items-center justify-between" type="button">
                                    <input type="text" class="border-none outline-none px-0 text-sm focus:ring-0 cursor-pointer w-full h-4 text-gray-900" readonly value="" placeholder="Type de véhicule">
                                    <input type="hidden" id="selected-categories-list" name="categories" value="">
                                    <svg class="w-5 h-5 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7"/>
                                    </svg>
                                </button>
                                <div id="categories-dropdown" class="z-10 hidden bg-white rounded-lg shadow w-full dark:bg-gray-700">
                                    <div class="p-3">
                                        <label for="category-search" class="sr-only">Search</label>
                                        <div class="relative">
                                            <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                                                <svg class="w-3 h-3 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                                </svg>
                                            </div>
                                            <input type="text" id="category-search" class="block w-full placeholder:text-xs p-2 ps-8 text-sm text-gray-900 border border-gray-300 rounded-md bg-white focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500" placeholder="Type de véhicule">
                                        </div>
                                    </div>
                                    <ul id="categories-list" class="max-h-48 px-3 pb-3 overflow-y-auto text-sm text-gray-700 dark:text-gray-200" aria-labelledby="category-search-dropdown">
                                        @foreach ($categories as $category)
                                        <li data-name="{{$category->name}}">
                                            <div class="flex items-center ps-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                            <input id="category-{{$category->id}}"  @checked(request('categories') != '' && in_array($category->id, explode(',', request('categories')))) type="checkbox" data-name="{{$category->name}}" value="{{$category->id}}" class="w-4 h-4 text-indigo-600 bg-white border-gray-300 rounded focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-0 dark:bg-gray-600 dark:border-gray-500">
                                            <label for="category-{{$category->id}}" class="w-full py-2 ms-2 text-xs font-medium text-gray-900 rounded dark:text-gray-300">{{$category->name}}</label>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="w-full relative">
                                <button id="brand-search-dropdown" data-dropdown-toggle="brands-dropdown" data-dropdown-placement="bottom" class="text-gray-600 border bg-transparent focus:ring-1 focus:outline-none focus:ring-indigo-300 w-full relative rounded-lg text-sm px-2 py-2.5 text-center inline-flex items-center justify-between" type="button">
                                    <input type="text" class="border-none outline-none px-0 text-sm focus:ring-0 cursor-pointer w-full h-4 text-gray-900" readonly value="" placeholder="Marque">
                                    <input type="hidden" id="selected-brands-list" name="brands" value="">
                                    <svg class="w-5 h-5 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7"/>
                                    </svg>
                                </button>
                                <div id="brands-dropdown" class="z-10 hidden bg-white rounded-lg shadow w-full dark:bg-gray-700">
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
                                        @foreach ($brands as $brand)
                                        <li data-name="{{$brand->name}}">
                                            <div class="flex items-center ps-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                            <input id="brand-{{$brand->id}}"  @checked(request('brands') != '' && in_array($brand->id, explode(',', request('brands')))) type="checkbox" data-name="{{$brand->name}}" value="{{$brand->id}}" class="w-4 h-4 text-indigo-600 bg-white border-gray-300 rounded focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-0 dark:bg-gray-600 dark:border-gray-500">
                                            <label for="brand-{{$brand->id}}" class="w-full py-2 ms-2 text-xs font-medium text-gray-900 rounded dark:text-gray-300">{{$brand->name}}</label>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="w-full relative">
                                <button id="model-search-dropdown" data-dropdown-toggle="models-dropdown" data-dropdown-placement="bottom" class="text-gray-600 border bg-transparent focus:ring-1 focus:outline-none focus:ring-indigo-300 w-full rounded-lg text-sm px-2 py-2.5 text-center inline-flex items-center justify-between" type="button">
                                    <input type="text" class="border-none outline-none px-0 text-sm focus:ring-0 cursor-pointer w-full h-4 text-gray-900" readonly value="" placeholder="Modèles">
                                    <input type="hidden" id="selected-models-list" name="models" value="">
                                    <svg class="w-5 h-5 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7"/>
                                    </svg>
                                </button>
                                <div id="models-dropdown" class="z-10 hidden bg-white rounded-lg shadow w-full dark:bg-gray-700">
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
                                        @foreach ($models as $type)
                                        <li data-name="{{$type->name}}">
                                            <div class="flex items-center ps-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                            <input id="model-{{$type->id}}" @checked(request('models') != '' && in_array($type->id, explode(',', request('models')))) type="checkbox" data-name="{{$type->name}}" value="{{$type->id}}" class="w-4 h-4 text-indigo-600 bg-white border-gray-300 rounded focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-0 dark:bg-gray-600 dark:border-gray-500">
                                            <label for="model-{{$type->id}}" class="w-full py-2 ms-2 text-xs font-medium text-gray-900 rounded dark:text-gray-300">{{$type->name}}</label>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="dropdown-container">
                    <div class="flex items-center gap-2 justify-between mt-4 button">
                        <h2 class="font-semibold text-base">Caractéristiques</h2>
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5"/>
                        </svg>
                    </div>
                    <div class="mt-4 flex flex-col gap-3 dropdown">
                        <div>
                            <h2 class="mb-3 font-medium">Année</h2>
                            <div class="flex items-start gap-2 justify-between">
                                <div class="relative w-full">
                                    <input type="text" id="min-year" name="min_year" value="{{request('min_year')}}" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                    <label for="min-year" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Anneé min</label>
                                </div>
                                <div class="relative w-full">
                                    <input type="text" id="max-year" name="max_year" value="{{request('max_year')}}" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                    <label for="max-year" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Anneé max</label>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4">
                            <h2 class="mb-3 font-semibold">Kilométrage</h2>
                            <div class="flex items-start gap-2 justify-between">
                                <div class="relative w-full">
                                    <input type="number" id="min-mileage" name="min_mileage" value="{{request('min_mileage')}}" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                    <label for="min-mileage" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Km min</label>
                                </div>
                                <div class="relative w-full">
                                    <input type="number" id="max-mileage" name="max_mileage" value="{{request('max_mileage')}}" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                    <label for="max-mileage" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Km max</label>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4">
                            <h2 class="mb-3 font-semibold">Energie</h2>
                            <div class="">
                                @foreach ($energies as $energy)
                                <div>
                                    <div class="flex items-center rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                    <input id="energy-{{$energy->id}}" name="energies" @checked(in_array($energy->id, explode(',', request('energies')))) type="checkbox" value="{{$energy->id}}" class="w-4 h-4 text-blue-600 bg-white border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-0 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="energy-{{$energy->id}}" class="w-full py-2 ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">{{$energy->name}}</label>
                                    </div>
                                </div>
                                @endforeach 
                            </div>
                        </div>
                        <div class="mt-4">
                            <h2 class="mb-3 font-semibold">Boîte de vitesse</h2>
                            <div class="">
                                <div>
                                    <div class="flex items-center rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                    <input id="gearbox-automatic" type="radio" name="gearbox" @checked(request('gearbox')=='automatic') value="automatic" class="w-4 h-4 text-blue-600 bg-white border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 rounded-full focus:ring-0 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="gearbox-automatic" class="w-full py-2 ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Boîte automatique</label>
                                    </div>
                                </div>
                                <div>
                                    <div class="flex items-center rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                    <input id="gearbox-manual" type="radio" name="gearbox" @checked(request('gearbox')=='manual') value="manual" class="w-4 h-4 text-blue-600 bg-white border-gray-300 rounded-full focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-0 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="gearbox-manual" class="w-full py-2 ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Boîte Manuelle</label>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="dropdown-container">
                    <div class="flex items-center gap-2 justify-between mt-4 button">
                        <h2 class="font-semibold text-base">Couleurs</h2>
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5"/>
                        </svg>
                    </div>
                    <div class="mt-4 flex flex-col gap-3 dropdown">
                        <div class="mt-2">
                            <input type="hidden" id="selected-exterior-colors-list" name="exterior_colors">
                            <h2 class="mb-3 font-semibold">Couleurs extérieur</h2>
                            <div id="exterior-colors-list">
                                @foreach ($colors->filter(function($q){return $q->exterior == true;}) as $color)
                                <div>
                                    <div class="flex items-center rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                    <input id="color-{{$color->id}}" @checked(in_array($color->id, explode(',', request('exterior_colors')))) type="checkbox" value="{{$color->id}}" class="w-4 h-4 text-blue-600 bg-white border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-0 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="color-{{$color->id}}" class="w-full py-2 ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">{{$color->name}}</label>
                                    </div>
                                </div>
                                @endforeach 
                            </div>
                        </div>
                        <div class="mt-4">
                            <input type="hidden" id="selected-interior-colors-list" name="interior_colors">
                            <h2 class="mb-3 font-semibold">Couleurs intérieur</h2>
                            <div id="interior-colors-list">
                                @foreach ($colors->filter(function($q){return $q->interior == true;}) as $color)
                                <div>
                                    <div class="flex items-center rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                    <input id="color-{{$color->id}}" @checked(in_array($color->id, explode(',', request('interior_colors')))) type="checkbox" value="{{$color->id}}" class="w-4 h-4 text-blue-600 bg-white border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-0 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="color-{{$color->id}}" class="w-full py-2 ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">{{$color->name}}</label>
                                    </div>
                                </div>
                                @endforeach 
                            </div>
                        </div>
                    </div>
                </div>
                <div class="dropdown-container">
                    <div class="flex items-center gap-2 justify-between mt-4 button">
                        <h2 class="font-semibold text-base">Performances</h2>
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5"/>
                        </svg>
                    </div>
                    <div class="mt-4 flex flex-col gap-3 dropdown">
                        <div>
                            <div class="flex items-start gap-2 justify-between">
                                <div class="relative w-full">
                                    <input type="text" id="min-fiscal-horsepower" name="max_fiscal_horsepower" value="{{request('max_fiscal_horsepower')}}" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                    <label for="min-fiscal-horsepower" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">P. fiscale min</label>
                                </div>
                                <div class="relative w-full">
                                    <input type="text" id="max-fiscal-horsepower" name="max_fiscal_horsepower" value="{{request('max_fiscal_horsepower')}}" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                    <label for="max-fiscal-horsepower" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">P. fiscale max</label>
                                </div>
                            </div>
                        </div>
                        <div class="mt-2">
                            <div class="flex items-start gap-2 justify-between">
                                <div class="relative w-full">
                                    <input type="number" id="min-power" name="min_power" value="{{request('min_power')}}" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                    <label for="min-power" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">P. DIN (ch) min</label>
                                </div>
                                <div class="relative w-full">
                                    <input type="number" id="max-power" name="max_power" value="{{request('max_power')}}" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                    <label for="max-power" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">P. DIN (ch) max</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="dropdown-container">
                    <div class="flex items-center gap-2 justify-between mt-4 button">
                        <h2 class="font-semibold text-base">Equipements & options</h2>
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5"/>
                        </svg>
                    </div>
                    <div class="mt-4 flex flex-col gap-3 dropdown">
                        <div class="">
                            <div class="flex flex-col items-start gap-4">
                                <div class="relative w-full">
                                    <div id="equipment-options-dropdown" class="bg-white rounded-lg shadow w-full dark:bg-gray-700">
                                        <div class="p-3">
                                            <input type="hidden" id="selected-options-list" name="options" value="">
                                            <label for="option-search" class="sr-only">Search</label>
                                            <div class="relative">
                                                <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                                </svg>
                                                </div>
                                                <input type="text" id="option-search" class="options-search block w-full placeholder:text-xs p-2 ps-8 text-sm text-gray-900 border border-gray-300 rounded-md bg-white focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500" placeholder="Rechercher un équipement">
                                            </div>
                                        </div>
                                        <ul id="options-list" class="options-list max-h-48 px-3 pb-3 overflow-y-auto text-sm text-gray-700 dark:text-gray-200" aria-labelledby="option-search-dropdown">
                                            @foreach ($options as $option)
                                            <li data-name="{{$option->name}}">
                                                <div class="flex items-center ps-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                                <input id="model-{{$option->id}}" type="checkbox" data-name="{{$option->name}}" value="{{$option->id}}" class="w-4 h-4 text-indigo-600 bg-white border-gray-300 focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-0 dark:bg-gray-600 dark:border-gray-500 rounded">
                                                <label for="model-{{$option->id}}" class="w-full py-2 ms-2 text-xs font-medium text-gray-900 rounded dark:text-gray-300">{{$option->name}}</label>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="dropdown-container">
                    <div class="flex items-center gap-2 justify-between mt-4 button">
                        <h2 class="font-semibold text-base">Dimensions</h2>
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5"/>
                        </svg>
                    </div>
                    <div class="mt-4 flex flex-col gap-3 dropdown">
                        <div>
                            <div class="relative w-full">
                                <input type="text" id="max-length" name="max_length" value="{{request('max_length')}}" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                <label for="max-length" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">L max</label>
                            </div>
                        </div>
                        <div class="mt-2">
                            <div class="relative w-full">
                                <input type="text" id="max-width" name="max_width" value="{{request('max_width')}}" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                <label for="max-width" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">I max</label>
                            </div>
                        </div>
                        <div class="mt-2">
                            <div class="relative w-full">
                                <input type="text" id="max-height" name="max_height" value="{{request('max_height')}}" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                <label for="max-height" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">H max</label>
                            </div>
                        </div>

                        <div class="mt-4">
                            <h2 class="mb-3 font-semibold">Volume de coffre</h2>
                            <div>
                                <div class="relative w-full">
                                    <input type="text" id="trunk-volume" name="min_trunk_volume" value="{{request('min_trunk_volume')}}" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                    <label for="trunk-volume" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Volume min</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-6 flex justify-end">
                    <x-secondary-button x-on:click="$dispatch('close')">
                        Annuler
                    </x-secondary-button>
    
                    <x-primary-button class="ms-3">
                        Filtre
                    </x-primary-button>
                </div>
            </form>
           
        </x-modal>
        <form method="GET" action="{{route('admin.vehicules.index')}}" class="w-full mx-auto mb-4">
            <div class="flex">
                <label for="search-input" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Numéro d'annonce</label>
                <div class="relative w-full">
                    <input type="search" name="id" id="search-input" value="{{request('id')}}" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-lg border  border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-s-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" placeholder="Numéro d'annonce" />
                    <button type="submit" class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white bg-blue-700 rounded-e-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                        <span class="sr-only">Rechercher</span>
                    </button>
                </div>
            </div>
        </form>
        <div class="bg-white flex justify-center flex-col rounded-md shadow-md overflow-hidden group">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-gray-500 dark:text-gray-400 ltr:text-left rtl:text-right">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                <div class="flex items-center">
                                    Marque
                                    <a href="{{route('admin.vehicules.index', ['order_by' => 'name', 'order_type' => request('order_type') == '' || request('order_type') == 'desc' ?'asc':'desc'])}}">
                                        <svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                                        </svg>
                                    </a>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <div class="flex items-center">
                                    Année
                                    <a href="{{route('admin.vehicules.index', ['order_by' => 'year', 'order_type' => request('order_type') == '' || request('order_type') == 'desc' ?'asc':'desc'])}}">
                                        <svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                                        </svg>
                                    </a>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <div class="flex items-center">
                                    Boîte de vitesse
                                    <a href="{{route('admin.vehicules.index', ['order_by' => 'gearbox', 'order_type' => request('order_type') == '' || request('order_type') == 'desc' ?'asc':'desc'])}}">
                                        <svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                                        </svg>
                                    </a>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <div class="flex items-center">Image</div>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <div class="flex items-center">Couleur</div>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <div class="flex items-center">Energie</div>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <div class="flex items-center">
                                    Enchères
                                    <a href="{{route('admin.vehicules.index', ['order_by' => 'auctions_count', 'order_type' => request('order_type') == '' || request('order_type') == 'desc' ?'asc':'desc'])}}">
                                        <svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                                        </svg>
                                    </a>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <div class="flex items-center">
                                    Prix
                                    <a href="{{route('admin.vehicules.index', ['order_by' => 'price', 'order_type' => request('order_type') == '' || request('order_type') == 'desc' ?'asc':'desc'])}}">
                                        <svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                                        </svg>
                                    </a>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <div class="flex items-center">
                                    Date
                                    <a href="{{route('admin.vehicules.index', ['order_by' => 'created_at', 'order_type' => request('order_type') == '' || request('order_type') == 'desc' ?'asc':'desc'])}}">
                                        <svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                                        </svg>
                                    </a>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($vehicules as $vehicule)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                @if ($vehicule->serie)
                                    @if ($vehicule->serie) {{$vehicule->serie->brand->name}} @endif {{$vehicule->serie->name}}
                                @else
                                Non trouvée
                                @endif
                            </th>
                            <td class="px-6 py-4">
                                {{$vehicule->year}}
                            </td>
                            <td class="px-6 py-4">
                                @if ($vehicule->gearbox == 'automatic') Automatique @elseif($vehicule->gearbox == 'manual') Manuelle @endif
                            </td>
                            <td class="px-6 py-4">
                                <img class="h-[24px] max-h-auto max-w-[44px]" src="{{$vehicule->getImage()}}" alt="">
                            </td>
                            <th scope="row" class="px-6 py-4 whitespace-nowrap font-medium">
                                @if ($vehicule->color)
                                    {{$vehicule->color->name}}
                                @else
                                Non trouvée
                                @endif
                            </th>
                            <th scope="row" class="px-6 py-4 whitespace-nowrap font-medium">
                                @if ($vehicule->energy)
                                    {{$vehicule->energy->name}}
                                @else
                                Non trouvée
                                @endif
                            </th>
                            <td class="px-6 py-4">
                                @if ($vehicule->auctions_count > 0)
                                <a href="{{route('admin.auctions.index', ['vehicule' => $vehicule->id])}}">{{number_format($vehicule->auctions_count)}}</a>
                                @else
                                Non
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <span class="whitespace-nowrap">{{number_format($vehicule->price, 0 , ' ', ' ')}} €</span>
                            </td>
                            <td class="px-6 py-4">
                                {{Carbon\Carbon::parse($vehicule->created_at)->format('d/m/Y')}}
                            </td>
                            <td class="px-6 py-4 flex gap-2 items-center justify-end">
                                <div>
                                    <a target="__blank" href="{{route('vehicule', $vehicule->id)}}" class="font-medium text-yellow-600 dark:text-yellow-500 hover:underline">Voir</a>
                                </div>
                                <div>
                                    <a href="{{route('admin.vehicules.edit', $vehicule->id)}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Modifier</a>
                                </div>
                                <div>
                                    <button data-modal-target="delete-vehicule-modal-popup-{{$vehicule->id}}" data-modal-toggle="delete-vehicule-modal-popup-{{$vehicule->id}}" type="button" class="">
                                        <h3 class="font-medium text-red-600 dark:text-red-500 hover:underline">Supprimer</h3>
                                     </button>
                                     <div id="delete-vehicule-modal-popup-{{$vehicule->id}}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                        <div class="relative p-4 w-full max-w-md max-h-full">
                                           <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                 <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="delete-vehicule-modal-popup-{{$vehicule->id}}">
                                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                       <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                 </button>
                                                 <div class="p-4 md:p-5 text-center">
                                                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                       <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                                    </svg>
                                                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Etes-vous sûr de vouloir supprimer cette vehicule?</h3>
                                                    <div class="flex items-center justify-center">
                                                       <form action="{{route('admin.vehicules.destroy', $vehicule->id)}}" method="POST" class="delete-vehicule">
                                                          @csrf
                                                          @method('DELETE')
                                                          <button type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                                                            Oui, je suis sûr
                                                          </button>
                                                       </form>
                                                       <button data-modal-hide="delete-vehicule-modal-popup-{{$vehicule->id}}" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Non</button>
                                                    </div>
                                                 </div>
                                           </div>
                                        </div>
                                     </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @if ($vehicules->hasPages())
            <div class="mt-4">
                {{$vehicules->links()}}
            </div>
        @endif
    </div>
</div>
@endsection
@section('scripts')
<script>
    let categoryList = document.getElementById('categories-list'); 
    let brandList = document.getElementById('brands-list'); 
    let modelList = document.getElementById('models-list'); 
    let energyList = document.getElementById('energies-list'); 
    let optionsList = document.getElementById('options-list'); 
    let exteriorColorsList = document.getElementById('exterior-colors-list'); 
    let interiorColorsList = document.getElementById('interior-colors-list'); 
    let maxPrice = document.getElementById('max-price');
    let minPrice = document.getElementById('min-price');
    let priceRange = document.getElementById('price-range');
    listFilterByName(document.getElementById('brand-search'), brandList);
    listFilterByName(document.getElementById('category-search'), categoryList);
    listFilterByName(document.getElementById('model-search'), modelList);
    listFilterByName(document.getElementById('option-search'), optionsList);

 
    let categorySearchDropdownBtn = document.getElementById('category-search-dropdown');
    categoryList.querySelectorAll('li').forEach(item => {
        let input = item.querySelector('input[type="checkbox"]');
        let checkedCategories = categoryList.querySelectorAll('li input[type="checkbox"]:checked');
        categorySearchDropdownBtn.querySelector('input').value = '';
        var names = [];
        var ids = [];
        checkedCategories.forEach(checkedBrand => {
            names.push(checkedBrand.dataset.name);
            ids.push(checkedBrand.value);
        });
        categorySearchDropdownBtn.querySelector('input').value = names.join(', ');
        categorySearchDropdownBtn.querySelector('#selected-categories-list').value = ids.join(',');
        input.addEventListener('change', function (){
            let checkedCategories = categoryList.querySelectorAll('li input[type="checkbox"]:checked');
            categorySearchDropdownBtn.querySelector('input').value = '';
            var names = [];
            var ids = [];
            checkedCategories.forEach(checkedBrand => {
                names.push(checkedBrand.dataset.name);
                ids.push(checkedBrand.value);
            });
            categorySearchDropdownBtn.querySelector('input').value = names.join(', ');
            categorySearchDropdownBtn.querySelector('#selected-categories-list').value = ids.join(',');
        });
    });

    let brandSearchDropdownBtn = document.getElementById('brand-search-dropdown');
    brandList.querySelectorAll('li').forEach(item => {
        let input = item.querySelector('input[type="checkbox"]');
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

    optionsList.querySelectorAll('li').forEach(item => {
        let input = item.querySelector('input[type="checkbox"]');
        input.addEventListener('change', function (){
            let checkedOptions = optionsList.querySelectorAll('li input[type="checkbox"]:checked');
            var names = [];
            var ids = [];
            checkedOptions.forEach(checkedOption => {
                names.push(checkedOption.dataset.name);
                ids.push(checkedOption.value);
            });
            document.querySelector('#selected-options-list').value = ids.join(',');
        });
    });

    exteriorColorsList.querySelectorAll('div').forEach(item => {
        let input = item.querySelector('input[type="checkbox"]');
        input.addEventListener('change', function (){
            let checkedColors = exteriorColorsList.querySelectorAll('div input[type="checkbox"]:checked');
            var names = [];
            var ids = [];
            checkedColors.forEach(checkedColor => {
                names.push(checkedColor.dataset.name);
                ids.push(checkedColor.value);
            });
            document.querySelector('#selected-exterior-colors-list').value = ids.join(',');
        });
    });

    interiorColorsList.querySelectorAll('div').forEach(item => {
        let input = item.querySelector('input[type="checkbox"]');
        input.addEventListener('change', function (){
            let checkedColors = interiorColorsList.querySelectorAll('div input[type="checkbox"]:checked');
            var names = [];
            var ids = [];
            checkedColors.forEach(checkedColor => {
                names.push(checkedColor.dataset.name);
                ids.push(checkedColor.value);
            });
            document.querySelector('#selected-interior-colors-list').value = ids.join(',');
        });
    });
</script>
@endsection