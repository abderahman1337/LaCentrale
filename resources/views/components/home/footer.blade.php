@php
    $website_social_links = Settings::website_social_links();
    $footerMenus = Cache::remember('footer-menus', config('app.cache_remember'), function () {
        return App\Models\Menu::where('location', 'footer')->with('items')->get();
    });
@endphp
<div>
    <footer class="bg-primary py-10 px-10">
        <div class="container mx-auto text-white flex lg:flex-row flex-col items-start justify-between gap-4">
            @foreach ($footerMenus as $menu)
            <div>
                <h2 class="mb-3 font-bold">{{$menu->name}}</h2>
                <ul class="text-sm flex flex-col gap-3 font-normal">
                    @foreach ($menu->items as $item)
                    <li>
                        <a class="hover:underline" href="{{$item->url}}">{{$item->name}}</a>
                    </li>
                    @endforeach
                </ul>
            </div>
            @endforeach
        </div>
        <div class="pt-10 border-t mt-16 mx-auto container text-white border-opacity-30 border-white">
            <div class="flex mb-4 flex-wrap gap-2 justify-center">
                @if ($website_social_links['facebook'] != '')
                <a aria-label="Facebook" href="{{$website_social_links['facebook']}}">
                    <button aria-label="Facebook" type="button" class="mb-2 inline-block rounded-full px-2.5 py-2.5 text-xs font-medium uppercase leading-normal text-white shadow-md transition duration-150 ease-in-out hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg"
                    style="background-color: #1877f2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"> <path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z" /> </svg>
                    </button>
                </a>
                @endif
                @if ($website_social_links['youtube'] != '')
                <a aria-label="Youtube" href="{{$website_social_links['youtube']}}">
                    <button aria-label="Youtube" type="button" class="mb-2 inline-block rounded-full px-2.5 py-2.5 text-xs font-medium uppercase leading-normal text-white shadow-md transition duration-150 ease-in-out hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg"
                    style="background: #f00">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M21.7 8.037a4.26 4.26 0 0 0-.789-1.964 2.84 2.84 0 0 0-1.984-.839c-2.767-.2-6.926-.2-6.926-.2s-4.157 0-6.928.2a2.836 2.836 0 0 0-1.983.839 4.225 4.225 0 0 0-.79 1.965 30.146 30.146 0 0 0-.2 3.206v1.5a30.12 30.12 0 0 0 .2 3.206c.094.712.364 1.39.784 1.972.604.536 1.38.837 2.187.848 1.583.151 6.731.2 6.731.2s4.161 0 6.928-.2a2.844 2.844 0 0 0 1.985-.84 4.27 4.27 0 0 0 .787-1.965 30.12 30.12 0 0 0 .2-3.206v-1.516a30.672 30.672 0 0 0-.202-3.206Zm-11.692 6.554v-5.62l5.4 2.819-5.4 2.801Z" clip-rule="evenodd"/>
                      </svg>
                    </button>
                </a>
                @endif
                @if ($website_social_links['tiktok'] != '')
                <a aria-label="Tiktok" href="{{$website_social_links['tiktok']}}">
                    <button aria-label="Tiktok" type="button" class="mb-2 inline-block rounded-full px-2.5 py-2.5 text-xs font-medium uppercase leading-normal text-white shadow-md transition duration-150 ease-in-out hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg"
                    style="background-color: #000">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="h-5 w-5"> <path fill="currentColor" d="M448,209.91a210.06,210.06,0,0,1-122.77-39.25V349.38A162.55,162.55,0,1,1,185,188.31V278.2a74.62,74.62,0,1,0,52.23,71.18V0l88,0a121.18,121.18,0,0,0,1.86,22.17h0A122.18,122.18,0,0,0,381,102.39a121.43,121.43,0,0,0,67,20.14Z" /> </svg>
                    </button>
                </a>
                @endif
                @if ($website_social_links['linkedin'] != '')
                <a aria-label="linkedin" href="{{$website_social_links['linkedin']}}">
                    <button aria-label="Linkedin" type="button" class="mb-2 inline-block rounded-full px-2.5 py-2.5 text-xs font-medium uppercase leading-normal text-white shadow-md transition duration-150 ease-in-out hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg"
                    style="background-color: #0a66c2">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M12.51 8.796v1.697a3.738 3.738 0 0 1 3.288-1.684c3.455 0 4.202 2.16 4.202 4.97V19.5h-3.2v-5.072c0-1.21-.244-2.766-2.128-2.766-1.827 0-2.139 1.317-2.139 2.676V19.5h-3.19V8.796h3.168ZM7.2 6.106a1.61 1.61 0 0 1-.988 1.483 1.595 1.595 0 0 1-1.743-.348A1.607 1.607 0 0 1 5.6 4.5a1.601 1.601 0 0 1 1.6 1.606Z" clip-rule="evenodd"/>
                        <path d="M7.2 8.809H4V19.5h3.2V8.809Z"/>
                      </svg>
                    </button>
                </a>
                @endif
                @if ($website_social_links['twitter'] != '')
                <a aria-label="Twitter" href="{{$website_social_links['twitter']}}">
                        <button aria-label="Twitter" type="button" class="mb-2 inline-block rounded-full px-2.5 py-2.5 text-xs font-medium uppercase leading-normal text-white shadow-md transition duration-150 ease-in-out hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg"
                    style="background-color: #1da1f2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"> <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" /> </svg> 
                    </button>
                </a>
                @endif
            </div>
            <div class="flex items-center justify-center w-full">
                <p class="text-xs">Copyright ® {{ $websiteName }} 2024 - Tous droits réservés</p>
            </div>
        </div>
    </footer>
</div>