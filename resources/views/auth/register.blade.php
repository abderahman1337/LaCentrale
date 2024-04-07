@extends('layouts.auth')
@section('title', 'Inscription')
@section('content')
    <div class="lg:w-[373px] w-full mx-auto lg:border rounded-lg p-6 py-8 mt-10">
        <x-auth-session-status class="mb-4" :status="session('status')" />
        <h2 class="font-medium text-xl text-center">Inscription</h2>
        <div class="mt-6">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div>
                    <div class="relative">
                        <input type="text" name="name" id="name" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                        <label for="name" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Nom & Prénom</label>
                    </div>
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
                <div class="mt-3">
                    <div class="relative">
                        <input type="email" name="email" id="email" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                        <label for="email" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Addresse email</label>
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                <div class="mt-3">
                    <div class="relative">
                        <input type="password" required name="password" id="password" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                        <label for="password" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Mot de passe</label>
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
                <div class="mt-3">
                    <div class="relative">
                        <input type="password" required name="password_confirmation" id="password-confirmation" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                        <label for="password-confirmation" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Confirmer le mot de passe</label>
                    </div>
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>
                <div class="mt-4 flex items-center justify-center">
                    <button type="submit" class="bg-primary hover:bg-primaryHover mx-auto font-semibold py-2.5 px-12 rounded-full text-primaryText text-base">
                        S'inscrire
                    </button>
                </div>
                @if (Route::has('login'))
                <hr class="mt-6 mb-4">
                <div class="flex items-center gap-2 justify-center mt-2">
                    <span class="text-sm">Vous avez déjà un compte ?</span>
                    <a class="underline text-sm text-primary font-medium dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">Connexion</a>
                </div>
            @endif
            </form>
        </div>
    </div>
@endsection
