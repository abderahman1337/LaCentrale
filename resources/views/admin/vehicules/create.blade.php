@extends('layouts.admin')
@section('title', 'Les véhicules')
@section('content')
<div>
    <div class="flex items-center justify-between">
        <h2 class="lg:text-2xl text-xl font-bold">Ajouter un véhicules</h2>
    </div>
    <form action="{{route('admin.vehicules.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mt-6 flex lg:flex-row flex-col items-start gap-4">
            <div class="lg:w-[65%] w-full flex flex-col gap-4">
                <div class="bg-white rounded-md shadow-md group w-full p-6">
                    <h2 class="mb-6 font-semibold text-xl">Marques/Modèles</h2>
                    <div class="w-full relative">
                        <button id="model-search-dropdown" data-dropdown-toggle="models-dropdown" data-dropdown-placement="bottom" class="text-gray-600 border bg-transparent focus:ring-1 focus:outline-none focus:ring-indigo-300 w-full rounded-lg text-sm px-2 py-2.5 text-center inline-flex items-center justify-between" type="button">
                            <input type="text" class="border-none outline-none px-0 text-sm focus:ring-0 cursor-pointer w-full h-4 text-gray-900" readonly value="" placeholder="Modèles">
                            <input type="hidden" id="selected-model" name="model" value="">
                            <svg class="w-5 h-5 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7"/>
                            </svg>
                        </button>
                        <div id="models-dropdown" class="z-20 hidden bg-white rounded-lg shadow w-full dark:bg-gray-700">
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
                                @foreach ($models as $model)
                                <li data-name="{{$model->brand->name}} {{$model->name}}">
                                    <div class="flex items-center ps-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                    <input name="model" id="model-{{$model->id}}" @checked(old('model')==$model->id) type="radio" data-name="{{$model->brand->name}} {{$model->name}}" value="{{$model->id}}" class="w-4 h-4 text-indigo-600 bg-white border-gray-300 focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-0 dark:bg-gray-600 dark:border-gray-500 rounded-full">
                                    <label for="model-{{$model->id}}" class="w-full py-2 ms-2 text-xs font-medium text-gray-900 rounded dark:text-gray-300">{{$model->brand->name}} {{$model->name}}</label>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="mt-4">
                        <div class="relative">
                            <input type="text" name="price" id="vehicule-price" value="{{old('price')}}" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                            <label for="vehicule-price" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Prix</label>
                        </div>
                        @error('price')
                            <div class="error-msg">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="bg-white rounded-md shadow-md group w-full p-6">
                    <h2 class="mb-6 font-semibold text-xl">Caractéristiques</h2>
                    <div class="flex flex-col gap-4">
                        <div>
                            <div class="relative">
                                <input type="text" name="origin" id="vehicule-origin" value="{{old('origin', 'France')}}" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                <label for="vehicule-origin" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Provenance</label>
                            </div>
                            @error('origin')
                                <div class="error-msg">{{$message}}</div>
                            @enderror
                        </div>
                        <div>
                            <div class="relative">
                                <input type="date" name="release_date" id="vehicule-release-date" value="{{old('release_date')}}" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                <label for="vehicule-release-date" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Mise en circulation</label>
                            </div>
                            @error('release_date')
                                <div class="error-msg">{{$message}}</div>
                            @enderror
                        </div>
                        <div>
                            <div class="relative">
                                <input type="number" name="year" id="vehicule-year" value="{{old('year')}}" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                <label for="vehicule-year" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Année</label>
                            </div>
                            @error('year')
                                <div class="error-msg">{{$message}}</div>
                            @enderror
                        </div>
                        <div>
                            <div class="relative">
                                <input type="number" name="mileage" id="vehicule-mileage" value="{{old('mileage')}}" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                <label for="vehicule-mileage" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Kilométrage compteur</label>
                            </div>
                            @error('mileage')
                                <div class="error-msg">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="flex flex-col sm:flex-row items-start gap-4">
                            <div class="w-full">
                                <div class="relative">
                                    <input type="number" max="10" name="doors_number" id="vehicule-doors-number" value="{{old('doors_number')}}" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                    <label for="vehicule-doors-number" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Nombre de portes</label>
                                </div>
                                @error('doors_number')
                                    <div class="error-msg">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="w-full">
                                <div class="relative">
                                    <input type="number" max="10" name="places_number" id="vehicule-places-number" value="{{old('places_number')}}" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                    <label for="vehicule-places-number" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Nombre de places</label>
                                </div>
                                @error('places_number')
                                    <div class="error-msg">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="flex flex-col sm:flex-row items-start gap-4">
                            <div class="w-full">
                                <div class="relative">
                                    <input type="number" step=".01" name="length" id="vehicule-length" value="{{old('length')}}" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                    <label for="vehicule-length" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Longeur</label>
                                </div>
                                @error('length')
                                    <div class="error-msg">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="w-full">
                                <div class="relative">
                                    <input type="number" step=".01" name="width" id="vehicule-width" value="{{old('width')}}" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                    <label for="vehicule-width" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Largeur</label>
                                </div>
                                @error('width')
                                    <div class="error-msg">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="w-full">
                                <div class="relative">
                                    <input type="number" step=".01" name="height" id="vehicule-height" value="{{old('height')}}" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                    <label for="vehicule-height" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Hauteur</label>
                                </div>
                                @error('height')
                                    <div class="error-msg">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <label for="vehicule-energy" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Couleur</label>
                            <select name="color" id="vehicule-color" class="border border-gray-300 text-gray-500 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-2.5 py-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>Couleur</option>
                                @foreach ($colors as $color)
                                <option value="{{$color->id}}">{{$color->name}}</option>
                                @endforeach
                              </select>
                        </div>
                        <div>
                            <label for="vehicule-energy" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Energie</label>
                            <select name="energy" id="vehicule-energy" class="border border-gray-300 text-gray-500 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-2.5 py-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>Energie</option>
                                @foreach ($energies as $energy)
                                <option value="{{$energy->id}}">{{$energy->name}}</option>
                                @endforeach
                              </select>
                        </div>
                        <div>
                            <label for="vehicule-gearbox" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Boîte de vitesse</label>
                            <select name="gearbox" id="vehicule-gearbox" class="border border-gray-300 text-gray-500 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-2.5 py-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>Boîte de vitesse</option>
                                <option value="automatic">Automatique</option>
                                <option value="manual">Manualle</option>
                              </select>
                        </div>
                        <div>
                            <label for="vehicule-technical-control" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contrôle technique</label>
                            <select name="technical_control" id="vehicule-technical-control" class="border border-gray-300 text-gray-500 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-2.5 py-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>Contrôle technique</option>
                                <option value="1">Requis</option>
                                <option value="0">Non requis</option>
                              </select>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-md shadow-md group w-full p-6">
                    <h2 class="mb-6 font-semibold text-xl">Equipements & options</h2>
                    <div id="equipments-list" class="flex flex-col gap-4">
                        @foreach($equipments as $equipment)
                        <div class="bg-gray-50 rounded p-4 shadow-sm equipment">
                            <h2 class="mb-6 font-semibold text-base">{{$equipment->name}}</h2>
                            <div class="flex flex-col items-start gap-4">
                                <div class="relative w-full">
                                    <div id="equipment-{{$equipment->id}}-options-dropdown" class="bg-white rounded-lg shadow w-full dark:bg-gray-700">
                                        <div class="p-3">
                                            <label for="option-search-{{$equipment->id}}" class="sr-only">Search</label>
                                            <div class="relative">
                                                <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                                </svg>
                                                </div>
                                                <input type="text" id="option-search-{{$equipment->id}}" class="options-search block w-full placeholder:text-xs p-2 ps-8 text-sm text-gray-900 border border-gray-300 rounded-md bg-white focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500" placeholder="Rechercher">
                                            </div>
                                        </div>
                                        <ul class="options-list max-h-48 px-3 pb-3 overflow-y-auto text-sm text-gray-700 dark:text-gray-200" aria-labelledby="option-search-{{$equipment->id}}-dropdown">
                                            @foreach ($equipment->options as $option)
                                            <li data-name="{{$option->name}}">
                                                <div class="flex items-center ps-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                                <input name="options[]" id="model-{{$option->id}}" type="checkbox" data-name="{{$option->name}}" value="{{$option->id}}" class="w-4 h-4 text-indigo-600 bg-white border-gray-300 focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-0 dark:bg-gray-600 dark:border-gray-500 rounded">
                                                <label for="model-{{$option->id}}" class="w-full py-2 ms-2 text-xs font-medium text-gray-900 rounded dark:text-gray-300">{{$option->name}}</label>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    
                </div>
            </div>
            <div class="lg:w-[35%] w-full flex flex-col gap-4">
                <div class="bg-white rounded-md shadow-md group w-full p-6">
                    <h2 class="mb-6 font-semibold text-xl">Images</h2>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="vehicule-images">Les images</label>
                        <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="vehicule-images" name="images[]" multiple type="file">
                    </div>
                </div>

                <div class="bg-white rounded-md shadow-md group w-full p-6">
                    <h2 class="mb-6 font-semibold text-xl">Puissance</h2>
                    <div class="flex flex-col sm:flex-row items-start gap-4">
                        <div class="w-full">
                            <div class="relative">
                                <input type="number" name="fiscal_horsepower" id="vehicule-fiscal-horsepower" value="{{old('fiscal_horsepower')}}" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                <label for="vehicule-fiscal-horsepower" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Puissance fiscale (CV)</label>
                            </div>
                            @error('fiscal_horsepower')
                                <div class="error-msg">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="w-full">
                            <div class="relative">
                                <input type="number" name="power" id="vehicule-power" value="{{old('power')}}" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                <label for="vehicule-power" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Puissance (DIN) ch</label>
                            </div>
                            @error('power')
                                <div class="error-msg">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-md shadow-md group w-full p-6">
                    <h2 class="mb-6 font-semibold text-xl">Consommation</h2>
                    <div class="flex flex-col sm:flex-row items-start gap-4">
                        <div class="w-full">
                            <div class="relative">
                                <input type="number" name="consumption" id="vehicule-consumption" value="{{old('consumption')}}" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                <label for="vehicule-consumption" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Consommation (L/100km)</label>
                            </div>
                            @error('consumption')
                                <div class="error-msg">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="w-full">
                            <div class="relative">
                                <input type="number" name="co2_emission" id="vehicule-co2-emission" value="{{old('co2_emission')}}" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                <label for="vehicule-co2-emission" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Emission de CO2 (g/km)</label>
                            </div>
                            @error('co2_emission')
                                <div class="error-msg">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mt-4">
                        <label for="vehicule-aqc" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Crit'Air</label>
                        <select name="air_quality_cetificate" id="vehicule-aqc" class="border border-gray-300 text-gray-500 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-2.5 py-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="" selected>Crit'Air</option>
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                          </select>
                    </div>
                    <div class="mt-4">
                        <label for="vehicule-euro-standars" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Norme euro</label>
                        <select name="euro_standars" id="vehicule-euro-standars" class="border border-gray-300 text-gray-500 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-2.5 py-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Norme euro</option>
                            <option value="EURO1">Euro1</option>
                            <option value="EURO2">Euro2</option>
                            <option value="EURO3">Euro3</option>
                            <option value="EURO4">Euro4</option>
                            <option value="EURO5">Euro5</option>
                            <option value="EURO6">Euro6</option>
                          </select>
                    </div>
                </div>
                <div class="bg-white rounded-md shadow-md group w-full p-6">
                    <h2 class="mb-6 font-semibold text-xl">Garantie</h2>
                    <div class="relative">
                        <input type="text" name="guarantee" id="vehicule-guarantee" value="{{old('guarantee')}}" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                        <label for="vehicule-guarantee" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Garantie</label>
                    </div>
                    @error('guarantee')
                        <div class="error-msg">{{$message}}</div>
                    @enderror
                </div>
            </div>
        </div>
        <button type="submit" class="text-white inline-flex w-max mt-4 items-center bg-primary hover:bg-primaryHover focus:ring-4 focus:outline-none focus:ring-primaryLight font-medium rounded-lg text-sm px-5 py-2.5 text-center">
            Ajouter
        </button>
    </form>
</div>
@endsection
@section('scripts')
    <script>
    let modelList = document.getElementById('models-list'); 
    listFilterByName(document.getElementById('model-search'), modelList);
    let modelSearchDropdownBtn = document.getElementById('model-search-dropdown');
    modelList.querySelectorAll('li').forEach(item => {
        let input = item.querySelector('input[type="radio"]');
        input.addEventListener('change', function (){
            let selected = this;
            modelSearchDropdownBtn.querySelector('input').value = selected.dataset.name;
            modelSearchDropdownBtn.querySelector('#selected-model').value = selected.value;
        });
    });

    let equipmentsList = document.querySelectorAll('#equipments-list .equipment');
    equipmentsList.forEach(equipment => {
        let optionsList = equipment.querySelector('.options-list');
        let optionsSearch = equipment.querySelector('.options-search');
        listFilterByName(optionsSearch, optionsList);

    });
    </script>
@endsection