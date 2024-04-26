@extends('layouts.home')
@section('title', "Les Modèles")
@section('content')
<div class="mb-10">
    <div>
        <div class="flex items-center justify-between">
            <h2 class="lg:text-3xl text-xl font-bold">Les Modèles</h2>
        </div>
        <div class="mt-6">
            <div class="grid lg:grid-cols-6 grid-cols-2 gap-4 items-stretch">
                @foreach ($models as $model)
                <a class="block bg-white rounded-[20px] shadow-md overflow-hidden group" href="{{route('vehicules.listing', ['models' => $model->id])}}">
                    <div class="flex justify-center flex-col">
                        <div class="py-4">
                            <div class="mt-2">
                                <h3 class="font-semibold text-center group-hover:underline">{{$model->brand?$model->brand->name:''}} {{$model->name}}</h3>
                            </div>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection