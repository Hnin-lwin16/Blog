
{{-- <x-layout> --}}

  
<x-layout>
    <!-- blogs section -->
    <x-blog-section :blogs="$blogs" :categories="$categories" :currentCategory="$currentCategory??null"/>

    <!-- subscribe new blogs -->
   <x-subscribe/>
   
</x-layout>