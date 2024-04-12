@extends('layouts.admin')
@section('title', 'Les enchères')
@section('content')
<div>
    <div class="flex items-center justify-between">
        <h2 class="lg:text-2xl text-xl font-bold">Les enchères</h2>
        <button data-modal-target="new-auction-modal" data-modal-toggle="new-auction-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
            Ajouter
        </button>
        <div id="new-auction-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                            Ajouter une nouveau enchère
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="new-auction-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <form method="POST" action="{{route('admin.auctions.store')}}" class="p-4 md:p-5">
                        @csrf
                        <div class="flex flex-col gap-4 mb-4">
                            <div class="">
                                <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Prix</label>
                                <input type="text" name="price" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="19000" required="required">
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
        <div class="bg-white flex justify-center flex-col rounded-md shadow-md overflow-hidden group">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-gray-500 dark:text-gray-400 ltr:text-left rtl:text-right">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                <div class="flex items-center">Vehicule</div>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Image
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Utilisateur
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Telephone
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <div class="flex items-center">
                                    Prix
                                    <a href="{{route('admin.auctions.index', ['order_by' => 'price', 'order_type' => request('order_type') == ''?'asc':'desc'])}}">
                                        <svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                                        </svg>
                                    </a>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <div class="flex items-center">
                                    Date
                                    <a href="{{route('admin.auctions.index', ['order_by' => 'created_at', 'order_type' => request('order_type') == ''?'asc':'desc'])}}">
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
                        @foreach ($auctions as $auction)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$auction->vehicule->serie->brand->name}} {{$auction->vehicule->serie->name}}
                            </th>
                            <td class="px-6 py-4">
                                <img class="h-[24px] max-h-auto max-w-[44px]" src="{{$auction->vehicule->getImage()}}" alt="">
                            </td>
                            <td class="px-6 py-4">
                                @if ($auction->user)
                                    {{$auction->user->name}}
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                @if ($auction->user)
                                    {{$auction->user->phone}}
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <span class="whitespace-nowrap">{{number_format($auction->price, 0 , ' ', ' ')}} €</span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="whitespace-nowrap">{{$auction->created_at}}</span>
                            </td>
                            <td class="px-6 py-4 flex gap-2 items-center justify-end">
                                <div>
                                    <button data-modal-target="edit-auction-modal-{{$auction->id}}" data-modal-toggle="edit-auction-modal-{{$auction->id}}" class="" type="button">
                                        <h3 class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Modifier</h3>
                                    </button>
                                    <div id="edit-auction-modal-{{$auction->id}}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                        <div class="relative p-4 w-full max-w-md max-h-full">
                                            <!-- Modal content -->
                                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                <!-- Modal header -->
                                                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                                        Modifier la marque
                                                    </h3>
                                                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="edit-auction-modal-{{$auction->id}}">
                                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                        </svg>
                                                        <span class="sr-only">Close modal</span>
                                                    </button>
                                                </div>
                                                <!-- Modal body -->
                                                <form method="POST" action="{{route('admin.auctions.update', $auction->id)}}" class="p-4 md:p-5">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="flex flex-col gap-4 mb-4">
                                                        <div class="">
                                                            <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Prix</label>
                                                            <input type="text" name="price" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{old('price', $auction->price)}}" placeholder="19000" required="required">
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
                                <div>
                                    <button data-modal-target="delete-auction-modal-popup-{{$auction->id}}" data-modal-toggle="delete-auction-modal-popup-{{$auction->id}}" type="button" class="">
                                        <h3 class="font-medium text-red-600 dark:text-red-500 hover:underline">Supprimer</h3>
                                     </button>
                                     <div id="delete-auction-modal-popup-{{$auction->id}}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                        <div class="relative p-4 w-full max-w-md max-h-full">
                                           <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                 <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="delete-auction-modal-popup-{{$auction->id}}">
                                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                       <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                 </button>
                                                 <div class="p-4 md:p-5 text-center">
                                                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                       <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                                    </svg>
                                                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Etes-vous sûr de vouloir supprimer cette marque ?</h3>
                                                    <div class="flex items-center justify-center">
                                                       <form action="{{route('admin.auctions.destroy', $auction->id)}}" method="POST" class="delete-auction">
                                                          @csrf
                                                          @method('DELETE')
                                                          <button type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                                                            Oui, je suis sûr
                                                          </button>
                                                       </form>
                                                       <button data-modal-hide="delete-auction-modal-popup-{{$auction->id}}" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Non</button>
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
        @if ($auctions->hasPages())
            <div class="mt-4">
                {{$auctions->links()}}
            </div>
        @endif
    </div>
</div>
@endsection