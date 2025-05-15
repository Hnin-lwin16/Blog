
{{-- <x-layout> --}}

  
<x-layout>
   
    @if (session('success'))
        <div class="alert text-alert text-center">{{ session('success') }}</div>
    @endif
    <x-hero></x-hero>
    <!-- blogs section -->
    <x-blog-section :blogs="$blogs" />

    <!-- subscribe new blogs -->
   <x-subscribe/>
   
</x-layout>