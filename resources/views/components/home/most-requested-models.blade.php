<div>
    <div class="flex items-center justify-between">
        <h2 class="lg:text-3xl text-xl font-bold">Les modèles les plus demandés</h2>
        <a class="text-blue-500 underline font-semibold whitespace-nowrap" href="{{route('models')}}">Voir tout</a>
    </div>
    <div class="mt-6">
        <div class="grid lg:grid-cols-5 grid-cols-2 gap-4 items-stretch">
            @foreach ($models as $vehiculeModel)
            <a class="block bg-white rounded-[20px] shadow-md overflow-hidden group" href="{{route('vehicules.listing', ['models' => $vehiculeModel->id])}}">
                {{-- @if ($vehiculeModel->image != null)
                <div class="h-[92px]">
                    <img class="mx-auto max-h-[92px] max-w-[170px]" data-src="{{$vehiculeModel->getImage()}}" alt="{{$vehiculeModel->brand->name}} {{$vehiculeModel->name}}">
                </div>
                @endif --}}
                
                <div class="flex justify-center flex-col">
                    <div class="py-6">
                        <div class="mt-2 flex flex-col gap-2 justify-center">
                            <div class="flex justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="text-primary" width="45" height="29" fill="none" viewBox="0 0 40 24"><path fill="currentColor" fill-rule="evenodd" d="M8.98 2.08h10.6c2.22 0 4.37.63 6.04 1.8l6.36 4.44 5.54 2.6c.82.4 1.42 1.15 1.42 2.05v2.93a2.33 2.33 0 0 1-2.33 2.33h-.9a4.66 4.66 0 0 1-9.1 0H12.97a4.66 4.66 0 0 1-9.1 0h-.58c-1.23 0-2.23-1-2.23-2.23v-4.14q0-.81.38-1.53l3.22-6.01c.78-1.41 2.5-2.24 4.32-2.24m0 1.92h1.46l-.8 2.35c-.22.67-.11 1.37.29 1.95.54.78 1.5 1.21 2.5 1.25l13.17.26a.6.6 0 0 0 .6-.59l.02-.72a.6.6 0 0 0-.59-.6l-6.35-.13L19.23 4h.34c1.87 0 3.63.53 4.95 1.46l6.43 4.49.05.03.05.03.04.02 5.61 2.64c.3.13.32.29.32.3v2.93a.4.4 0 0 1-.4.4h-.9a4.66 4.66 0 0 0-9.11 0H12.97a4.66 4.66 0 0 0-9.1 0h-.58a.3.3 0 0 1-.31-.3v-4.14q0-.32.16-.62l3.2-6C6.74 4.56 7.73 4 8.98 4m2.48 2.97 1-2.97h4.85l.05 3.73-4.87-.1c-.5-.02-.84-.22-.98-.42l-.06-.12zM5.7 17.32v-.1a2.74 2.74 0 1 1 0 .1m22.74-.01v-.08a2.74 2.74 0 0 1 5.47.03v.01a2.74 2.74 0 0 1-5.47.04" clip-rule="evenodd"></path></svg>
                            </div>
                            <h3 class="font-semibold text-center group-hover:underline">{{$vehiculeModel->brand->name}} {{$vehiculeModel->name}}</h3>
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</div>