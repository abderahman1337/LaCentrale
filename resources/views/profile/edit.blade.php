@extends('layouts.home')
@section('title', 'Profil')
@section('content')
<div class="mx-auto sm:px-6 lg:px-8 space-y-6 mb-10">
    <div class="grid sm:grid-cols-2 grid-cols-1 gap-4">
        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <div class="w-full">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>
    
        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <div class="w-full">
                @include('profile.partials.update-password-form')
            </div>
        </div>
    </div>

    <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
        <div class="">
            @include('profile.partials.delete-user-form')
        </div>
    </div>
</div>
@endsection