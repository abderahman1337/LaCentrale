@extends('layouts.admin')
@section('title', 'Les marques')
@section('content')
<div>
    <div class="flex items-center justify-between">
        <h2 class="lg:text-3xl text-xl font-bold">Les marques</h2>
        <!-- New Brand -->
        <button data-modal-target="new-brand-modal" data-modal-toggle="new-brand-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
            Ajouter
        </button>
        <!-- New Brand modal -->
        <div id="new-brand-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                            Ajouter une nouvelle marque
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="new-brand-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <form method="POST" action="{{route('admin.brands.store')}}" enctype="multipart/form-data" class="p-4 md:p-5">
                        @csrf
                        <div class="flex flex-col gap-4 mb-4">
                            <div class="">
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Marque</label>
                                <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Mercedes" required="required">
                            </div>
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="brand-logo">Logo</label>
                                <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="brand-image-help" id="brand-logo" name="logo" type="file">
                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="brand-image-help">SVG, PNG ou JPG .</p>
                            </div>
                        </div>
                        <button type="submit" class="text-white inline-flex items-center bg-primary hover:bg-primaryHover focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                            <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                            Ajouter
                        </button>
                    </form>
                </div>
            </div>
        </div> 
  

    </div>
    <div class="mt-6">
        <div class="grid lg:grid-cols-6 grid-cols-2 gap-4 items-stretch">
            @foreach ($brands as $brand)
            <a href="#">
                <div class="bg-white flex justify-center flex-col rounded-[20px] shadow-md overflow-hidden group">
                    <div class="py-4">
                        <img class="mx-auto h-[44px] max-h-auto max-w-[64px]" src="{{$brand->getImage()}}" alt="">
                        <div class="mt-2 flex items-center gap-2 justify-center">
                            <!-- New Brand -->
                            <button data-modal-target="edit-brand-modal-{{$brand->id}}" data-modal-toggle="edit-brand-modal-{{$brand->id}}" class="" type="button">
                                <h3 class="font-semibold text-center group-hover:underline">{{$brand->name}}</h3>
                            </button>
                            <!-- Edit Brand modal -->
                            <div id="edit-brand-modal-{{$brand->id}}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative p-4 w-full max-w-md max-h-full">
                                    <!-- Modal content -->
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                        <!-- Modal header -->
                                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                                Modifier la marque
                                            </h3>
                                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="edit-brand-modal-{{$brand->id}}">
                                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                        </div>
                                        <!-- Modal body -->
                                        <form method="POST" action="{{route('admin.brands.update', $brand->id)}}" enctype="multipart/form-data" class="p-4 md:p-5">
                                            @csrf
                                            @method('PUT')
                                            <div class="flex flex-col gap-4 mb-4">
                                                <div class="">
                                                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Marque</label>
                                                    <input type="text" name="name" id="name" value="{{old('name', $brand->name)}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Mercedes" required="required">
                                                </div>
                                                <div>
                                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="brand-logo">Logo</label>
                                                    <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="brand-image-help" id="brand-logo" name="logo" type="file">
                                                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="brand-image-help">SVG, PNG ou JPG .</p>
                                                </div>
                                            </div>
                                            <button type="submit" class="text-white inline-flex items-center bg-primary hover:bg-primaryHover focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                                Modifier
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</div>
@endsection