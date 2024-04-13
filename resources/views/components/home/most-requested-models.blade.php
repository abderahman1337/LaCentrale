<div>
    <div class="flex items-center justify-between">
        <h2 class="lg:text-3xl text-xl font-bold">Les modèles les plus demandés</h2>
        <a class="text-blue-500 underline font-semibold whitespace-nowrap" href="#">Voir tout</a>
    </div>
    <div class="mt-6">
        <div class="grid lg:grid-cols-5 grid-cols-2 gap-4 items-stretch">
            @foreach ($models as $vehiculeModel)
            <a href="#">
                <div class="h-[92px]">
                    <img class="mx-auto max-h-[92px] max-w-[170px]" data-src="{{$vehiculeModel->getImage()}}" alt="{{$vehiculeModel->brand->name}} {{$vehiculeModel->name}}">
                </div>
                <div class="bg-white flex justify-center flex-col rounded-[20px] shadow-md overflow-hidden group -mt-6">
                    <div class="py-6">
                        <div class="mt-2">
                            <h3 class="font-semibold text-center group-hover:underline">{{$vehiculeModel->brand->name}} {{$vehiculeModel->name}}</h3>
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</div>