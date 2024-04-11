@extends('layouts.admin')
@section('title', "Nouvelle page")
@section('content')
<h2 class="lg:text-2xl text-xl font-bold">Nouvelle page</h2>
<div class="mt-6">
    <form class="page-form" id="new-page-form" action="{{route('admin.pages.store')}}" method="post">
       @csrf
       <div class="flex items-start flex-col lg:flex-row gap-4 justify-between">
          <div class="bg-white flex justify-center flex-col rounded-md shadow-md overflow-hidden group w-full">
             <div class="p-6">
                <div class="mb-4">
                   <label class="label-control" for="page-title">Titre</label>
                   <input type="text" id="page-title" name="page_title" class="input-control" value="{{old('page_title')}}" placeholder="Titre" autofocus required>
                   @error('page_title')
                      <p class="error-msg">{{$message}}</p>
                   @enderror
                </div>
                <div class="mb-4">
                   <label class="label-control" for="page-slug">{{__("Slug")}}</label>
                   <div class="h-[50px] rounded-lg items-center gap-2 border ltr:pl-3 rtl:pr-3 border-[#e3e8ef] dark:border-gray-300 dark:border-opacity-10 flex overflow-hidden">
                      <span class="text-sm">https://example.com/page/</span>
                      <input type="text" id="page-slug" name="page_slug" class="h-[50px] outline-none text-sm border-0 border-[#e3e8ef] dark:border-gray-300 dark:border-opacity-10 dark:bg-darkBg ring-0 w-full focus:ring-0 focus:outline-none ltr:border-l rtl:border-r" value="{{old('page_slug')}}" placeholder="contact" required>
                   </div>
                   @error('page_slug')
                      <p class="error-msg">{{$message}}</p>
                   @enderror
                </div>
                <div class="mb-4">
                   <label class="label-control" for="page-description">{{__("Description")}}</label>
                   <textarea class="w-full tiny-editor rounded-lg border border-[#e3e8ef] h-[300px]" name="description" id="page-description">{{old('description')}}</textarea>
                   @error('description')
                      <p class="error-msg">{{$message}}</p>
                   @enderror
                </div>
                <div class="mt-4">
                   <input checked id="page-visibility" name="visibility" type="checkbox" value="1" class="w-5 h-5 text-primary cursor-pointer bg-gray-100 border-gray-300 rounded focus:ring-primary dark:focus:ring-primary dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                   <label for="page-visibility" class="ltr:ml-3 rtl:mr-3 text-sm font-medium cursor-pointer text-gray-900 dark:text-gray-300">{{__("Visible")}}</label>
                   @error('visibility')
                      <p class="error-msg">{{$message}}</p>
                   @enderror
                </div>
             </div>
          </div>
       </div>
       <button class="bg-primary text-primaryText py-2.5 px-5 rounded-lg font-medium mt-4 flex items-center gap-2.5" type="submit">
          <span>Publier</span>
       </button>
    </form>
 </div>
@endsection
@section('scripts')
<script type="text/javascript" src="/libs/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="/libs/tinymce/ar.js"></script>
<script>
   tinymce.init({
      selector: '.tiny-editor',
      plugins: ' advlist image media autolink code codesample directionality table wordcount quickbars link lists' ,// numlist bullist
      images_upload_url:"{{route('admin.upload_editor_image',['_token' => csrf_token() ])}}",
      file_picker_types: 'file image media',
      image_caption: true,
      image_dimensions:true,
      directionality : 'rtl',
      language: "{{App()->getLocale()=='ar'?'ar':'en'}}",
      quickbars_selection_toolbar: 'bold italic |h1 h2 h3 h4 h5 h6| formatselect | quicklink blockquote' ,// | numlist bullist
      entity_encoding : "raw",
      verify_html : false ,
      object_resizing : 'img',
      content_style: "body { font-family: Arial; }",
      height:500
   });   
</script>
@endsection