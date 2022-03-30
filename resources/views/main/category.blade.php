@extends('layouts.base')

@section('content')
<main class="blog">
    <div class="container">
        <h1 class="edica-page-title" data-aos="fade-up">{{ $category->title }}</h1>
        <section class="featured-posts-section">
            <div class="row">
                @foreach ($posts as $post)
                    <div class="col-md-4 fetured-post blog-post" data-aos="fade-right">
                        <div class="blog-post-thumbnail-wrapper">
                            <a href="{{ route('blog.show', $post->id) }}" class="blog-post-permalink">
                                <img src="{{ asset('storage/' . $post->preview_image) }}" alt="blog post">
                            </a>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="blog-post-category">{{ $post->category->title }}</p>
                            @auth
                                <form action="{{ route('blog.like.store', $post->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="border-0 bg-transparent">
                                        <span class="mr-1 text-dark" style="font-size: 13px;">{{ $post->liked_users_count }}</span>
                                        <i class="fa{{ auth()->user()->likedPosts->contains($post->id) ? 's' : 'r' }} fa-heart text-danger"></i>
                                    </button>
                                </form>
                            @endauth
                            @guest
                                <div>
                                    <span class="mr-1 text-dark" style="font-size: 13px;">{{ $post->liked_users_count }}</span>
                                    <i class="far fa-heart text-danger"></i>
                                </div>
                            @endguest
                        </div>
                        <a href="{{ route('blog.show', $post->id) }}" class="blog-post-permalink">
                            <h6 class="blog-post-title">{{ $post->title }}</h6>
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="mt-n5 mx-auto mb-5">
                {{ $posts->links() }}
            </div>
        </section>

    </div>
</main>
@endsection

