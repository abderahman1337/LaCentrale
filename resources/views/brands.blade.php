@php
    $page_title = 'Les marques';
@endphp
@extends('layouts.home')
@section('title', "Les marques")
@section('content')
<div class="mb-10">
    <div>
        <div class="flex items-center justify-between">
            <h2 class="lg:text-3xl text-xl font-bold">Les marques</h2>
        </div>
        <div class="mt-6">
            <div class="grid lg:grid-cols-6 grid-cols-2 gap-4 items-stretch">
                @foreach ($brands as $brand)
                <a href="{{route('vehicules.listing', ['brands' => $brand->id])}}">
                    <div class="bg-white flex justify-center flex-col rounded-[20px] shadow-md overflow-hidden group">
                        <div class="py-4">
                            @if ($brand->image != null)
                            <img class="mx-auto h-[44px] max-h-auto max-w-[64px]" data-src="{{$brand->getImage()}}" alt="{{$brand->name}}">
                            @endif
                            <div class="mt-2">
                                <h3 class="font-semibold text-center group-hover:underline">{{$brand->name}}</h3>
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