@extends('layouts.admin')
@section('title', 'Paramètres')
@section('content')
    <div>
        <h2 class="lg:text-2xl text-xl font-bold">Paramètres</h2>
        <div class="mt-6 grid sm:grid-cols-2 grid-cols-1 gap-5">
            <div class="bg-white flex justify-center flex-col rounded-md shadow-md overflow-hidden group p-6">
                <h2 class="mb-6 font-semibold text-xl">Général</h2>
                <form action="{{route('admin.settings.general.update')}}" method="post">
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
            </div>
            <div class="bg-white flex justify-center flex-col rounded-md shadow-md overflow-hidden group p-6">
                <h2 class="mb-6 font-semibold text-xl">Liens vers les réseaux sociaux</h2>
                <form action="{{route('admin.settings.social.update')}}" method="post">
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
        </div>
        <div class="mt-4 grid sm:grid-cols-2 grid-cols-1 gap-5">
            <div class="bg-white flex flex-col rounded-md shadow-md overflow-hidden p-6">
                <h2 class="mb-6 font-semibold text-xl">Logo & Favicon</h2>
                <form action="{{route('admin.settings.brand.images.update')}}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="grid sm:grid-cols-2 grid-cols-1 gap-4">
                        <div>
                            <h2 class="mb-2 text-sm font-semibold">Logo</h2>
                            <div class="border dark:border-gray-300 dark:border-opacity-10 rounded-lg px-2 py-1 relative group transition-all ease-linear">
                                <div class="opacity-0 transition-opacity group-hover:opacity-100 flex absolute inset-0 items-center justify-center group-hover:bg-[#ffffffd2]" style="z-index: 10">
                                    <button id="change-website-logo" onclick="document.getElementById('website-logo-input').click()" style="z-index: 11" type="button" class="delete-uploded-image h-[36px] w-[36px] flex items-center justify-center bg-white rounded-full text-[#697586] border border-[#e3e8ef] shadow-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                                        </svg>                                        
                                    </button>
                               </div>
                               <img id="website-logo-preview" class="mx-auto" src="{{$websiteLogo}}" alt="">
                            </div>
                            @error('website_logo')
                                <span class="error-msg">{{$message}}</span>
                            @enderror
                            <input class="hidden" type="file" name="website_logo" id="website-logo-input"/>
                        </div>
                        <div>
                            <div>
                                <h2 class="mb-2 text-sm font-semibold">Icône de favori du navigateur</h2>
                                <div class="border dark:border-gray-300 dark:border-opacity-10 rounded-lg px-2 py-1 relative group transition-all ease-linear">
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
                                   <img id="website-watermark-preview" class="mx-auto" src="{{asset(Settings::website_watermark())}}" alt=""/>
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
            <div class="bg-white flex flex-col rounded-md shadow-md overflow-hidden p-6">
                <h2 class="mb-6 font-semibold text-xl">SMTP</h2>
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
        </div>
        <div class="mt-4 grid sm:grid-cols-2 grid-cols-1 gap-5">
            
            <div class="bg-white flex flex-col rounded-md shadow-md overflow-hidden p-6">
                <h2 class="mb-6 font-semibold text-xl">Backup</h2>
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