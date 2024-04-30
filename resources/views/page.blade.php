@php
    $page_title = $page->title;
@endphp
@extends('layouts.home')
@section('title', $page->title)
@section('content')
   <div class="mt-10 mb-10">
      <h1 class="text-2xl sm:text-5xl font-bold text-center">{{$page->title}}</h1>
      <section class="mt-4 post-body">
         {!! $page->content !!}
      </section>
   </div>
@endsection