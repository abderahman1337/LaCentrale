<div>
    <div class="flex items-center justify-between">
        <h2 class="lg:text-3xl text-xl font-bold">Les marques les plus populaires</h2>
        <a class="text-blue-500 underline font-semibold whitespace-nowrap" href="{{route('brands')}}">Voir tout</a>
    </div>
    <div class="mt-6">
        <div class="grid lg:grid-cols-6 grid-cols-2 gap-4 items-stretch">
            @foreach ($brands as $vehiculeBrand)
            <a href="#">
                <div class="bg-white flex justify-center flex-col rounded-[20px] shadow-md overflow-hidden group">
                    <div class="py-4">
                        @if ($vehiculeBrand->image != null)
                        <img class="mx-auto h-[44px] max-h-auto max-w-[64px]" data-src="{{$vehiculeBrand->getImage()}}" alt="{{$vehiculeBrand->name}}">
                        @endif
                        <div class="mt-2">
                            <h3 class="font-semibold text-center group-hover:underline">{{$vehiculeBrand->name}}</h3>
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</div>