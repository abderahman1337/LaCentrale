@extends('layouts.admin')
@section('title', 'Les options')
@section('content')
<div>
    <div class="flex items-center justify-between">
        <h2 class="lg:text-2xl text-xl font-bold">Les options</h2>
        <!-- New Brand -->
        <button data-modal-target="new-option-modal" data-modal-toggle="new-option-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
            Ajouter
        </button>
        <!-- New Brand modal -->
        <div id="new-option-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                            Ajouter un nouveau option
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="new-option-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <form method="POST" action="{{route('admin.options.store')}}" class="p-4 md:p-5">
                        @csrf
                        <div class="flex flex-col gap-4 mb-4">
                            <div class="">
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Option</label>
                                <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="GPS" required="required">
                            </div>
                            <div class="">
                                <label for="equipment" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Equipement</label>
                                <select id="equipment" name="equipment" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                                    <option selected="">Sélectionnez l'equipement</option>
                                    @foreach ($equipments as $equipment)
                                    <option value="{{$equipment->id}}" @selected(old('equipment')==$equipment->id)>{{$equipment->name}}</option>
                                    @endforeach
                                </select>
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
                                <div class="flex items-center">Equipment</div>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <div class="flex items-center">
                                    Option
                                    <a href="{{route('admin.options.index', ['order_by' => 'name', 'order_type' => request('order_type') == ''?'asc':'desc'])}}">
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
                        @foreach ($options as $option)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$option->equipment->name}}
                            </th>
                            <td class="px-6 py-4">
                                {{$option->name}}
                            </td>
                            <td class="px-6 py-4 flex gap-2 items-center justify-end">
                                <div>
                                    <button data-modal-target="edit-option-modal-{{$option->id}}" data-modal-toggle="edit-option-modal-{{$option->id}}" class="" type="button">
                                        <h3 class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Modifier</h3>
                                    </button>
                                    <div id="edit-option-modal-{{$option->id}}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                        <div class="relative p-4 w-full max-w-md max-h-full">
                                            <!-- Modal content -->
                                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                <!-- Modal header -->
                                                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                                        Modifier l'option
                                                    </h3>
                                                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="edit-option-modal-{{$option->id}}">
                                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                        </svg>
                                                        <span class="sr-only">Close modal</span>
                                                    </button>
                                                </div>
                                                <!-- Modal body -->
                                                <form method="POST" action="{{route('admin.options.update', $option->id)}}" class="p-4 md:p-5">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="flex flex-col gap-4 mb-4">
                                                        <div class="">
                                                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">option</label>
                                                            <input type="text" name="name" id="name" value="{{old('name', $option->name)}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="GPS" required="required">
                                                        </div>
                                                        <div class="">
                                                            <label for="equipment" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Equipement</label>
                                                            <select id="equipment" name="equipment" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                                                                <option selected="">Sélectionnez l'equipement</option>
                                                                @foreach ($equipments as $equipment)
                                                                <option value="{{$equipment->id}}" @selected(old('equipment', $option->equipment_id)==$equipment->id)>{{$equipment->name}}</option>
                                                                @endforeach
                                                            </select>
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
                                @if ($option->options_count == 0)
                                <div>
                                    <button data-modal-target="delete-option-modal-popup-{{$option->id}}" data-modal-toggle="delete-option-modal-popup-{{$option->id}}" type="button" class="">
                                        <h3 class="font-medium text-red-600 dark:text-red-500 hover:underline">Supprimer</h3>
                                     </button>
                                     <div id="delete-option-modal-popup-{{$option->id}}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                        <div class="relative p-4 w-full max-w-md max-h-full">
                                           <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                 <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="delete-option-modal-popup-{{$option->id}}">
                                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                       <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                 </button>
                                                 <div class="p-4 md:p-5 text-center">
                                                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                       <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                                    </svg>
                                                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Etes-vous sûr de vouloir supprimer cette option?</h3>
                                                    <div class="flex items-center justify-center">
                                                       <form action="{{route('admin.options.destroy', $option->id)}}" method="POST" class="delete-option">
                                                          @csrf
                                                          @method('DELETE')
                                                          <button type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                                                            Oui, je suis sûr
                                                          </button>
                                                       </form>
                                                       <button data-modal-hide="delete-option-modal-popup-{{$option->id}}" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Non</button>
                                                    </div>
                                                 </div>
                                           </div>
                                        </div>
                                     </div>
                                </div>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @if ($options->hasPages())
            <div class="mt-4">
                {{$options->links()}}
            </div>
        @endif
    </div>
</div>
@endsection