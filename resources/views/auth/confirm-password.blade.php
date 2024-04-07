@extends('layouts.auth')
@section('title', 'Confirmer le mot de passe')
@section('content')
    <div class="lg:w-[373px] w-full mx-auto lg:border rounded-lg p-6 py-8 mt-10">
        <x-auth-session-status class="mb-4" :status="session('status')" />
        <h2 class="font-medium text-xl text-center">Confirmer le mot de passe</h2>
        <div class="mt-6">
            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf
                <div>
                    <div class="relative">
                        <input type="password" name="password" id="password" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                        <label for="password" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Mot de passe</label>
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
                
                <div class="mt-4 flex items-center justify-center">
                    <button type="submit" class="bg-primary hover:bg-primaryHover mx-auto font-semibold py-2.5 px-12 rounded-full text-primaryText text-base">
                        Confirmer
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection