@extends('layouts.home')
@section('title', "Favoris")
@section('content')
<div class="mt-20 mb-20">
    <h2 class="lg:text-3xl text-xl font-bold">Mes favoris</h2>
    <div class="mt-6">
        @if ($vehicules->isNotEmpty())
        <div class="grid lg:grid-cols-4 grid-cols-1 overflow-x-auto relative gap-4">
            @foreach ($vehicules as $vehicule)
                <x-home.vehicule-show-box :vehicule="$vehicule"></x-home.vehicule-show-box>
            @endforeach
        </div>
        @else
        <div>
            Aucune annonce en favoris
        </div>
        @endif
    </div>
</div>
@endsection