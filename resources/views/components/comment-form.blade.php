@props(['blog'])
@auth
    <section class="container">
    <div class="col-md-8 mx-auto">
      <x-card-wrapper>
      <form method="post" action="/blogs/{{ $blog->slug }}/comments">
        @csrf
        <div class="mb-3">

        <textarea name="body" cols="10" class="form-control border border-0" rows="5" required
          placeholder="say something...." id=""></textarea>
        <x-error name="body"/>
        </div>


        <div class=" d-flex justify-content-end"><button type="submit" class="btn btn-primary">Submit</button></div>
      </form>
      </x-card-wrapper>
    </div>
    </section>
  @else
    <p class=" text-center">please <a href="/login">login</a> to participate in this discussion</p>
  @endauth