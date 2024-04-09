<div>
    <footer class="bg-[#edeefe] py-10 px-10">
        <div class="container mx-auto text-gray-800 flex lg:flex-row flex-col items-start justify-between gap-4">
            @foreach (App\Models\Menu::where('location', 'footer')->with('items')->get() as $menu)
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
        <div class="pt-10 border-t mt-16 mx-auto container text-gray-800 border-opacity-30 border-purple-800">
            <div class="flex items-center justify-center w-full">
                <p class="text-xs">Copyright ® {{ $websiteName }} - Tous droits réservés</p>
            </div>
        </div>
    </footer>
</div>