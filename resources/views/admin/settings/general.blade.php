@extends('layouts.admin')
@section('title', 'Paramètres')
@section('content')

    <div>
        <h2 class="lg:text-2xl text-xl font-bold">Paramètres</h2>
        <div class="bg-white rounded-md shadow-md mt-6">
            <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
                <ul class="flex flex-nowrap -mb-px text-sm font-medium text-center overflow-x-auto" id="default-styled-tab" data-tabs-toggle="#default-styled-tab-content" data-tabs-active-classes="text-purple-600 hover:text-purple-600 dark:text-purple-500 dark:hover:text-purple-500 border-purple-600 dark:border-purple-500" data-tabs-inactive-classes="dark:border-transparent text-gray-500 hover:text-gray-600 dark:text-gray-400 border-gray-100 hover:border-gray-300 dark:border-gray-700 dark:hover:text-gray-300" role="tablist">
                    <li class="me-2" role="presentation">
                        <button class="inline-block p-4 border-b-2 rounded-t-lg" id="profile-styled-tab" data-tabs-target="#styled-profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Profil</button>
                    </li>
                    <li class="me-2" role="presentation">
                        <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="general-styled-tab" data-tabs-target="#general-tab" type="button" role="tab" aria-controls="general" aria-selected="false">Général</button>
                    </li>
                    <li role="presentation">
                        <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="social-styled-tab" data-tabs-target="#social-tab" type="button" role="tab" aria-controls="social" aria-selected="false">Social</button>
                    </li>
                    <li class="me-2" role="presentation">
                        <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="smtp-styled-tab" data-tabs-target="#smtp-tab" type="button" role="tab" aria-controls="smtp" aria-selected="false">SMTP</button>
                    </li>
                    <li role="presentation">
                        <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="backup-styled-tab" data-tabs-target="#backup-tab" type="button" role="tab" aria-controls="backup" aria-selected="false">Backup</button>
                    </li>
                    <li role="presentation">
                        <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="location-styled-tab" data-tabs-target="#location-tab" type="button" role="tab" aria-controls="location" aria-selected="false">Localisation</button>
                    </li>
                    <li role="presentation">
                        <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="tools-styled-tab" data-tabs-target="#tools-tab" type="button" role="tab" aria-controls="tools" aria-selected="false">Outils</button>
                    </li>
                </ul>
            </div>
            <div id="default-styled-tab-content">
                <div class="p-4 rounded-lg bg-white dark:bg-gray-800" id="styled-profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <form action="{{route('admin.settings.profile.update')}}" method="post">
                            @csrf
                            <h3 class="mb-6 text-xl font-semibold">Paramètres de profil et de compte</h3>
                            <div class="">
                                <div class="relative">
                                    <input type="text" name="username" id="username" value="{{auth()->user()->name}}" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                    <label for="username" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Nom</label>
                                </div>
                                @error('username')
                                    <span class="error-msg">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mt-4">
                                <div class="relative">
                                    <input type="text" name="user_phone" id="user-phone" value="{{auth()->user()->phone}}" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                    <label for="user-phone" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Téléphone/WhatsApp</label>
                                </div>
                                @error('user_phone')
                                    <span class="error-msg">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mt-4">
                                <div class="relative">
                                    <input type="text" name="user_email" id="user-email" value="{{auth()->user()->email}}" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                    <label for="user-email" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">E-mail</label>
                                </div>
                                @error('user_email')
                                    <span class="error-msg">{{$message}}</span>
                                @enderror
                            </div>
                           
                            <button type="submit" class="text-white inline-flex w-max mt-4 items-center bg-primary hover:bg-primaryHover focus:ring-4 focus:outline-none focus:ring-primaryLight font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                Sauvgarder
                            </button>
                        </form>
                        <form action="{{route('admin.settings.password.update')}}" method="post">
                            @csrf
                            <h3 class="mb-6 text-xl font-semibold">Réinitialiser le mot de passe</h3>
                            <div class="">
                                <div class="relative">
                                    <input type="text" name="current_password" id="current-password" value="" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                    <label for="current-password" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Mot de passe actuel</label>
                                </div>
                                @error('current_password')
                                    <span class="error-msg">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mt-4">
                                <div class="relative">
                                    <input type="text" name="password" id="new-password" value="" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                    <label for="new-password" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Nouveau mot de passe</label>
                                </div>
                                @error('password')
                                    <span class="error-msg">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mt-4">
                                <div class="relative">
                                    <input type="text" name="password_confirmation" id="new-password-confirmation" value="" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                    <label for="new-password-confirmation" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Confirmez le mot de passe</label>
                                </div>
                                @error('password_confirmation')
                                    <span class="error-msg">{{$message}}</span>
                                @enderror
                            </div>
                           
                            <button type="submit" class="text-white inline-flex w-max mt-4 items-center bg-primary hover:bg-primaryHover focus:ring-4 focus:outline-none focus:ring-primaryLight font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                Réinitialiser
                            </button>
                        </form>
                    </div>
                    
                </div>
                <div class="hidden p-4 rounded-lg bg-white dark:bg-gray-800" id="general-tab" role="tabpanel" aria-labelledby="general-tab">
                    <h3 class="mb-6 text-xl font-semibold">Paramètres généraux du site Web</h3>
                    <div class="flex flex-col gap-6">
                        <form class="bg-white border p-6 rounded" action="{{route('admin.settings.general.update')}}" method="post">
                            @csrf
                            <div class="">
                                <div class="relative">
                                    <input type="text" name="website_name" id="website-name" value="{{$websiteName}}" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                    <label for="website-name" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Titre</label>
                                </div>
                                @error('website_name')
                                    <span class="error-msg">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mt-4">
                                <div class="relative">
                                    <input type="text" name="website_address" id="website-address" value="{{$websiteAddress}}" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                    <label for="website-address" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Addresse</label>
                                </div>
                                @error('website_address')
                                    <span class="error-msg">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mt-4">
                                <div class="relative">
                                    <input type="text" name="website_phone" id="website-phone" value="{{$websitePhone}}" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                    <label for="website-phone" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Téléphone</label>
                                </div>
                                @error('website_phone')
                                    <span class="error-msg">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mt-4">
                                <div class="relative">
                                    <input type="text" name="website_email" id="website-email" value="{{$websiteEmail}}" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                    <label for="website-email" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">E-mail</label>
                                </div>
                                @error('website_email')
                                    <span class="error-msg">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mt-4">
                                <div class="relative">
                                    <input type="text" name="website_description" id="website-description" value="{{$websiteDescription}}" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                    <label for="website-description" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Description</label>
                                </div>
                                @error('website_description')
                                    <span class="error-msg">{{$message}}</span>
                                @enderror
                            </div>
                            <button type="submit" class="text-white inline-flex w-max mt-4 items-center bg-primary hover:bg-primaryHover focus:ring-4 focus:outline-none focus:ring-primaryLight font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                Sauvgarder
                            </button>
                        </form>
                        <form class="bg-white border p-6 rounded" action="{{route('admin.settings.brand.images.update')}}" enctype="multipart/form-data" method="post">
                            @csrf
                            <div class="grid sm:grid-cols-2 grid-cols-1 gap-4">
                                <div>
                                    <h2 class="mb-2 text-sm font-semibold">Logo</h2>
                                    <div class="border dark:border-gray-300 bg-white dark:border-opacity-10 rounded-lg px-2 py-1 relative group transition-all ease-linear">
                                        <div class="opacity-0 transition-opacity group-hover:opacity-100 flex absolute inset-0 items-center justify-center group-hover:bg-[#ffffffd2]" style="z-index: 10">
                                            <button id="change-website-logo" onclick="document.getElementById('website-logo-input').click()" style="z-index: 11" type="button" class="delete-uploded-image h-[36px] w-[36px] flex items-center justify-center bg-white rounded-full text-[#697586] border border-[#e3e8ef] shadow-sm">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                                                </svg>                                        
                                            </button>
                                        </div>
                                        <img id="website-logo-preview" class="mx-auto max-h-44 w-auto" src="{{$websiteLogo}}" alt="{{$websiteName}}">
                                    </div>
                                    @error('website_logo')
                                        <span class="error-msg">{{$message}}</span>
                                    @enderror
                                    <input class="hidden" type="file" name="website_logo" id="website-logo-input"/>
                                </div>
                                <div>
                                    <div>
                                        <h2 class="mb-2 text-sm font-semibold">Icône de favori du navigateur</h2>
                                        <div class="border dark:border-gray-300 bg-white dark:border-opacity-10 rounded-lg px-2 py-1 relative group transition-all ease-linear">
                                            <div class="opacity-0 transition-opacity group-hover:opacity-100 flex absolute inset-0 items-center justify-center group-hover:bg-[#ffffffd2]" style="z-index: 10">
                                                <button id="change-website-favicon" onclick="document.getElementById('website-favicon-input').click()" style="z-index: 11" type="button" class="delete-uploded-image h-[36px] w-[36px] flex items-center justify-center bg-white rounded-full text-[#697586] border border-[#e3e8ef] shadow-sm">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                                                    </svg>                                        
                                                </button>
                                            </div>
                                        <img id="website-favicon-preview" class="mx-auto" src="{{$websiteFavicon}}" alt=""/>
                                        </div>
                                        @error('website_favicon')
                                            <span class="error-msg">{{$message}}</span>
                                        @enderror
                                        <input class="hidden" type="file" name="website_favicon" id="website-favicon-input">
                                    </div>
                                    <div class="mt-4">
                                        <h2 class="mb-2 text-sm font-semibold">Filigrane d’image de véhicule</h2>
                                        <div class="border dark:border-gray-300 dark:border-opacity-10 rounded-lg px-2 py-1 relative group transition-all ease-linear bg-gray-400">
                                            <div class="opacity-0 transition-opacity group-hover:opacity-100 flex absolute inset-0 items-center justify-center group-hover:bg-[#ffffffd2]" style="z-index: 10">
                                                <button id="change-website-favicon" onclick="document.getElementById('website-watermark-input').click()" style="z-index: 11" type="button" class="delete-uploded-image h-[36px] w-[36px] flex items-center justify-center bg-white rounded-full text-[#697586] border border-[#e3e8ef] shadow-sm">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                                                    </svg>                                        
                                                </button>
                                            </div>
                                            <img id="website-watermark-preview" class="mx-auto max-h-20 w-auto" src="{{asset(Settings::website_watermark())}}" alt=""/>
                                        </div>
                                        @error('website_watermark')
                                            <span class="error-msg">{{$message}}</span>
                                        @enderror
                                        <input class="hidden" type="file" name="website_watermark" id="website-watermark-input">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="text-white inline-flex w-max mt-4 items-center bg-primary hover:bg-primaryHover focus:ring-4 focus:outline-none focus:ring-primaryLight font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                Sauvgarder
                            </button>
                        </form>
                    </div>
                </div>
                <div class="hidden p-4 rounded-lg bg-white dark:bg-gray-800" id="social-tab" role="tabpanel" aria-labelledby="social-tab">
                    <form action="{{route('admin.settings.social.update')}}" method="post">
                        <h3 class="mb-6 text-xl font-semibold">Liens vers les réseaux sociaux</h3>
                        @csrf
                        <div class="">
                            <div class="relative">
                                <input type="text" name="website_social_links[facebook]" id="website-social-facbook-link" value="{{$website_social_links['facebook']}}" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                <label for="website-social-facbook-link" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Facebook</label>
                            </div>
                            @error('website_social_links.facebook')
                                <span class="error-msg">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mt-4">
                            <div class="relative">
                                <input type="text" name="website_social_links[twitter]" id="website-social-twitter-link" value="{{$website_social_links['twitter']}}" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                <label for="website-social-twitter-link" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Twitter</label>
                            </div>
                            @error('website_social_links.twitter')
                                <span class="error-msg">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mt-4">
                            <div class="relative">
                                <input type="text" name="website_social_links[youtube]" id="website-social-youtube-link" value="{{$website_social_links['youtube']}}" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                <label for="website-social-youtube-link" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Youtube</label>
                            </div>
                            @error('website_social_links.youtube')
                                <span class="error-msg">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mt-4">
                            <div class="relative">
                                <input type="text" name="website_social_links[tiktok]" id="website-social-tiktok-link" value="{{$website_social_links['tiktok']}}" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                <label for="website-social-tiktok-link" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Tiktok</label>
                            </div>
                            @error('website_social_links.tiktok')
                                <span class="error-msg">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mt-4">
                            <div class="relative">
                                <input type="text" name="website_social_links[linkedin]" id="website-social-linkedin-link" value="{{$website_social_links['linkedin']}}" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                <label for="website-social-linkedin-link" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Linkedin</label>
                            </div>
                            @error('website_social_links.linkedin')
                                <span class="error-msg">{{$message}}</span>
                            @enderror
                        </div>
                        <button type="submit" class="text-white inline-flex w-max mt-4 items-center bg-primary hover:bg-primaryHover focus:ring-4 focus:outline-none focus:ring-primaryLight font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                            Sauvgarder
                        </button>
                    </form>
                </div>
                <div class="hidden p-4 rounded-lg bg-white dark:bg-gray-800" id="smtp-tab" role="tabpanel" aria-labelledby="smtp-tab">
                    <h3 class="mb-6 text-xl font-semibold">Paramètres Smtp pour l'envoi d'e-mails</h3>
                    <form action="{{route('admin.settings.smtp.update')}}" method="post">
                        @csrf
                        <div class="flex flex-col gap-4">
                            <div>
                                <div class="relative">
                                    <input type="text" name="mail_encryption" id="smtp-mail-encryption" value="{{config('mail.mailers.smtp.encryption')}}" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                    <label for="smtp-mail-encryption" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Encryption</label>
                                </div>
                                @error('mail_encryption')
                                    <span class="error-msg">{{$message}}</span>
                                @enderror
                            </div>
                            <div>
                                <div class="relative">
                                    <input type="text" name="mail_host" id="smtp-mail-host" value="{{config('mail.mailers.smtp.host')}}" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                    <label for="smtp-mail-host" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Host</label>
                                </div>
                                @error('mail_host')
                                    <span class="error-msg">{{$message}}</span>
                                @enderror
                            </div>
                            <div>
                                <div class="relative">
                                    <input type="number" name="mail_port" id="smtp-mail-port" value="{{config('mail.mailers.smtp.port')}}" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                    <label for="smtp-mail-port" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Port</label>
                                </div>
                                @error('mail_port')
                                    <span class="error-msg">{{$message}}</span>
                                @enderror
                            </div>
                            <div>
                                <div class="relative">
                                    <input type="text" name="mail_username" id="smtp-mail-username" value="{{config('mail.mailers.smtp.username')}}" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                    <label for="smtp-mail-username" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Username</label>
                                </div>
                                @error('mail_username')
                                    <span class="error-msg">{{$message}}</span>
                                @enderror
                            </div>
                            <div>
                                <div class="relative">
                                    <input type="password" name="mail_password" id="smtp-mail-password" value="{{config('mail.mailers.smtp.password')}}" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                    <label for="smtp-mail-password" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Password</label>
                                </div>
                                @error('mail_password')
                                    <span class="error-msg">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="text-white inline-flex w-max mt-4 items-center bg-primary hover:bg-primaryHover focus:ring-4 focus:outline-none focus:ring-primaryLight font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                            Sauvgarder
                        </button>
                    </form>
                </div>
                <div class="hidden p-4 rounded-lg bg-white dark:bg-gray-800" id="backup-tab" role="tabpanel" aria-labelledby="backup-tab">
                    <h3 class="mb-6 text-xl font-semibold">Sauvegarder la base de données sur un autre serveur</h3>
                    <form action="{{route('admin.settings.backup.update')}}" method="post">
                        @csrf
                        <div class="flex flex-col gap-4">
                            <div>
                                <div class="relative">
                                    <input type="text" name="remote_host" id="remote-host" value="{{config('backup.host')}}" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                    <label for="remote-host" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Remote Host</label>
                                </div>
                                @error('remote_host')
                                    <span class="error-msg">{{$message}}</span>
                                @enderror
                            </div>
                            <div>
                                <div class="relative">
                                    <input type="text" name="remote_username" id="remote-username" value="{{config('backup.username')}}" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                    <label for="remote-username" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Remote Username</label>
                                </div>
                                @error('remote_username')
                                    <span class="error-msg">{{$message}}</span>
                                @enderror
                            </div>
                            <div>
                                <div class="relative">
                                    <input type="text" name="save_path" id="save-path" value="{{config('backup.save_path')}}" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                    <label for="save-path" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Save Path</label>
                                </div>
                                @error('save_path')
                                    <span class="error-msg">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="text-white inline-flex w-max mt-4 items-center bg-primary hover:bg-primaryHover focus:ring-4 focus:outline-none focus:ring-primaryLight font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                            Sauvgarder
                        </button>
                    </form>
                </div>
                <div class="hidden p-4 rounded-lg bg-white dark:bg-gray-800" id="location-tab" role="tabpanel" aria-labelledby="location-tab">
                    <h3 class="mb-6 text-xl font-semibold">Localisation de vos véhicules</h3>
                    <form action="{{route('admin.settings.location.update')}}" method="post">
                        @csrf
                        <div class="flex lg:flex-row flex-col gap-4">
                            <div>
                                <div class="relative">
                                    <input type="text" name="latitude" id="location-latitude" value="{{auth()->user()->location!=null?explode(',', auth()->user()->location)[0]:''}}" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                    <label for="location-latitude" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Latitude</label>
                                </div>
                                @error('latitude')
                                    <span class="error-msg">{{$message}}</span>
                                @enderror
                            </div>
                            <div>
                                <div class="relative">
                                    <input type="text" name="longitude" id="location-longitude" value="{{auth()->user()->location!=null?explode(',', auth()->user()->location)[1]:''}}" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                    <label for="location-longitude" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Longitude</label>
                                </div>
                                @error('longitude')
                                    <span class="error-msg">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="text-white inline-flex w-max mt-4 items-center bg-primary hover:bg-primaryHover focus:ring-4 focus:outline-none focus:ring-primaryLight font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                            Sauvgarder
                        </button>
                    </form>
                </div>
                <div class="hidden p-4 rounded-lg bg-white dark:bg-gray-800" id="tools-tab" role="tabpanel" aria-labelledby="tools-tab">
                    <form action="{{route('admin.settings.cache.clear')}}" method="get">
                        <button type="submit" class="text-white inline-flex w-max items-center bg-red-600 hover:bg-red-500 focus:ring-4 focus:outline-none focus:ring-red-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                            Vider le cache
                        </button>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('scripts')
   <script>
      

      var websiteLogoInput = document.getElementById('website-logo-input');
      var websiteLogoPreview = document.getElementById('website-logo-preview');
      websiteLogoInput.addEventListener('change', function (){
         websiteLogoPreview.src = URL.createObjectURL(websiteLogoInput.files[0]);
      });


      var websiteFaviconInput = document.getElementById('website-favicon-input');
      var websiteFaviconPreview = document.getElementById('website-favicon-preview');
      websiteFaviconInput.addEventListener('change', function (){
         websiteFaviconPreview.src = URL.createObjectURL(websiteFaviconInput.files[0]);
      });

      var websiteWatermarkInput = document.getElementById('website-watermark-input');
      var websiteWatermarkPreview = document.getElementById('website-watermark-preview');
      websiteWatermarkInput.addEventListener('change', function (){
         websiteWatermarkPreview.src = URL.createObjectURL(websiteWatermarkInput.files[0]);
      });
   </script>
@endsection