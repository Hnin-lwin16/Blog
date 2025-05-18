<x-layout>
  <!-- navbar -->


  <!-- singloe blog section -->
  <div class="container">
    <div class="row">
      <div class="col-md-6 mx-auto text-center">
        <img
          src='{{ asset("storage/$blog->thumbnail") }}'
          class="card-img-top" alt="..." />
        <h3 class="my-3">{{ $blog->title }}</h3>
        <div>
          <div><a href="/?author={{ $blog->author->username }}">Author - {{ $blog->author->name }}</a></div>
          <div class=" bdge bg-warning"> <a
              href="/?category={{ $blog->category->slug }}">{{ $blog->category->name }}</a></div>
          <div class=" text-secondary">Date - {{ $blog->created_at->diffForHumans() }}</div>
          <div class="text-secondary">
            <form action="/blogs/{{ $blog->slug }}/subscribtion" method="post">
              @csrf
              @auth
                @if (auth()->user()->isSubscribed($blog))
                <button class="btn btn-danger">Unubscribe</button>
              @else
              <button class="btn btn-warning">Subscribe</button>
              @endif
              @endauth
              
               
            </form>
          </div>

        </div>
        <p class="lh-md">
          {!! $blog->body !!}
        </p>
      </div>
    </div>
  </div>
 <x-comment-form :blog="$blog"/>
  {{-- Comment System --}}
  @if ($blog->comments->count())
    <x-comments :comments="$blog->comments()->latest()->paginate(3)" />
  @endif
  <!-- subscribe new blogs -->
 
  <x-blogs_you_may_like :randomBlogs="$randomBlogs" />
  <!-- footer -->
</x-layout>