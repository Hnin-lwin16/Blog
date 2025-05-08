
<x-layout>

   <x-slot name="title"><title>All Blogs</title></x-slot>
        @foreach ($blogs as $blog)
        {{-- @dd($loop) --}}
        
         <h1><a href="blogs/{{  $blog->slug}}">{{ $blog->title }}</a></h1>
        <span>{{$blog->date  }}</span>
        <div>
         <p>{{  $blog->intro}}</p>
        </div>
    @endforeach
   
</x-layout>