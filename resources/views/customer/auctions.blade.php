@extends('layouts.home')
@section('title', "Mes enchères")
@section('content')
<div class="mt-20 mb-20">
    <h2 class="lg:text-3xl text-xl font-bold">Mes enchères</h2>
    <div class="mt-6">
        @if ($vehicules->isNotEmpty())
        <div class="grid lg:grid-cols-4 grid-cols-1 overflow-x-auto relative gap-4">
            @foreach ($vehicules as $vehicule)
                <x-home.vehicule-show-box :vehicule="$vehicule"></x-home.vehicule-show-box>
            @endforeach
        </div>
        @if ($vehicules->hasPages())
            <div class="mt-4">
                {{$vehicules->links()}}
            </div>
        @endif
        @else
        <div>
            Aucune enchères disponible
        </div>
        @endif
    </div>
</div>
@endsection