@extends('layouts.error')
@section('title', __("Too Many Requests"))
@section('content')
<section class="bg-white dark:bg-gray-900">
    <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
        <div class="mx-auto max-w-screen-sm text-center">
            <h1 class="mb-4 text-7xl tracking-tight font-extrabold lg:text-9xl text-blue-600 dark:text-blue-500">429</h1>
            <p class="mb-4 text-3xl tracking-tight font-bold text-gray-900 md:text-4xl dark:text-white">{{__("Too Many Requests")}}.</p>
            <p class="mb-4 text-lg font-light text-gray-500 dark:text-gray-400">{{__("Oops! We're receiving too many requests from your device. Please wait a moment and try again later. If this issue persists, feel free to contact support for assistance")}}.</p>
        </div>   
    </div>
</section>
@endsection