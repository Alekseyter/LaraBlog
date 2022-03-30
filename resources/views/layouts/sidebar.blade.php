<h5 class="mb-4">{{ __('Популярные посты') }}</h5>
@foreach ($likedPosts as $likedPost)
    <div class="my-4" data-aos="fade-left">
        <img src="{{ asset('storage/' . $likedPost->preview_image) }}" alt="blog post" class="w-50 mx-auto mb-2">
        <div>
            <h6>{{ $likedPost->title }}</h6>
        </div>
        @auth
            <form action="{{ route('blog.like.store', $likedPost->id) }}" method="POST">
                @csrf
                <button type="submit" class="border-0 bg-transparent">
                    <span class="mr-1 text-dark" style="font-size: 13px;">{{ $likedPost->liked_users_count }}</span>
                    <i class="fa{{ auth()->user()->likedPosts->contains($likedPost->id) ? 's' : 'r' }} fa-heart text-danger"></i>
                </button>
            </form>
        @endauth
        @guest
            <div>
                <span class="mr-1 text-dark" style="font-size: 13px;">{{ $likedPost->liked_users_count }}</span>
                <i class="far fa-heart text-danger"></i>
            </div>
        @endguest
    </div>
@endforeach

<h5 class="mt-5 mb-4" data-aos="fade-left">{{ __('Категории') }}</h5>
@foreach ($categories as $category)
    <a href="{{ route('blog.category.show', $category->id) }}" class="blog-post-permalink category-title-custom">
        <p class="blog-post-category" data-aos="fade-left">{{ $category->title }} ({{ $category->posts->count() }})</p>
    </a>
@endforeach
