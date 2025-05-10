
<x-layout>

   <x-slot name="title"><title>All Blogs</title></x-slot>
        @foreach ($blogs as $blog)
        {{-- @dd($loop) --}}
        
         <h1><a href="blogs/{{  $blog->slug}}">{{ $blog->title }}</a></h1>
         <span>Author- <a href="/users/{{ $blog->author->username }}">{{ $blog->author->name }}</a></span>
         <p><a href="/categories/{{ $blog->category->slug }}">{{ $blog->category->name }}</a></p>
        <span>{{$blog->created_at->diffForHumans()  }}</span>
        <div>
         <p>{{  $blog->intro}}</p>
        </div>
    @endforeach
   
</x-layout>