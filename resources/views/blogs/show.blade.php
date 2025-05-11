
<x-layout>
    <!-- navbar -->
    

    <!-- singloe blog section -->
    <div class="container">
      <div class="row">
        <div class="col-md-6 mx-auto text-center">
          <img
            src="https://creativecoder.s3.ap-southeast-1.amazonaws.com/blogs/GOLwpsybfhxH0DW8O6tRvpm4jCR6MZvDtGOFgjq0.jpg"
            class="card-img-top"
            alt="..."
          />
          <h3 class="my-3">{{ $blog->title }}</h3>
          <div>
            <div><a href="/?author={{ $blog->author->username }}">Author - {{ $blog->author->name }}</a></div>
            <div class=" bdge bg-warning"> <a href="/?category={{ $blog->category->slug }}">{{ $blog->category->name }}</a></div>
            <div class=" text-secondary">Date - {{ $blog->created_at->diffForHumans() }}</div>

          </div>
          <p class="lh-md">
            {{ $blog->body }}
          </p>
        </div>
      </div>
    </div>

    <!-- subscribe new blogs -->
   <x-subscribe/>
   <x-blogs_you_may_like :randomBlogs="$randomBlogs"/>
    <!-- footer -->
</x-layout>