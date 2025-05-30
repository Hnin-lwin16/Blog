@props(['blogs'])
<section class="container text-center" id="blogs">
    <h1 class="display-5 fw-bold mb-4">Blogs</h1>
    <x-category-dropdown/>
    <form action="" class="my-3">
        <div class="input-group mb-3">
            <input name="search" type="text" value="{{ request('search') }}" autocomplete="false"
                class="form-control" placeholder="Search Blogs..." />
				@if (request('category'))
					 <input name="category" type="hidden" value="{{ request('category') }}" autocomplete="false"
                class="form-control" placeholder="Search Blogs..." />
				@endif
				@if (request('author'))
					 <input name="author" type="hidden" value="{{ request('author') }}" autocomplete="false"
                class="form-control" placeholder="Search Blogs..." />
				@endif
            <button class="input-group-text bg-primary text-light" id="basic-addon2" type="submit">
                Search
            </button>
        </div>
    </form>
    <div class="row">
        @forelse ($blogs as $blog)
            <div class="col-md-4 mb-4">
                <x-blog-card :blog="$blog" />
            </div>
        @empty
            <p class="text-center">No Blog Found</p>
        @endforelse

		{{ $blogs->links() }}

    </div>
</section>
