@extends('layouts.base')

@section('content')
    <main class="blog-post">
        <div class="container">
            <h1 class="edica-page-title aos-init aos-animate" data-aos="fade-up">{{ $post->title }}</h1>
            <div class="edica-blog-post-meta aos-init aos-animate text-capitalize" data-aos="fade-up" data-aos-delay="200">
                <p>{{ $date->format('d.m.Y') }} • {{ $date->format('H:i') }}</p>
                <a href="#comment-list" class="text-decoration-none">{{ DeclensionNoun::make($post->comments->count(), 'Комментарий') }}</a>
                @auth
                <form action="{{ route('blog.like.store', $post->id) }}" method="POST" class="mt-3">
                    @csrf
                    <button type="submit" class="border-0 bg-transparent">
                        <i class="fa{{ auth()->user()->likedPosts->contains($post->id) ? 's' : 'r' }} fa-heart text-danger mb-1"></i>
                        <br><span class="text-dark" style="font-size: 13px;">{{ $post->liked_users_count }}</span>
                    </button>
                </form>
                @endauth
                @guest
                    <div>
                        <i class="far fa-heart text-danger mt-3 mb-1"></i>
                        <br><span class="text-dark" style="font-size: 13px;">{{ $post->liked_users_count }}</span>
                    </div>
                @endguest
            </div>

            <section class="blog-post-featured-img aos-init aos-animate mx-auto" data-aos="fade-up" data-aos-delay="300">
                <div class="row justify-content-center">
                    <img src="{{ asset('storage/' . $post->main_image) }}" alt="featured image" class="col-lg-6 col-md-8">
                </div>
            </section>
            <section class="post-content">
                <div class="row mb-5">
                    <div class="col-lg-9 mx-auto aos-init" data-aos="fade-up">
                        <p class="text-center">{!! $post->content !!}</p>
                    </div>
                </div>
            </section>
            <div class="row">
                <div class="col-lg-9 mx-auto">
                    @if ($relatedPosts->count() > 0)
                        <section class="related-posts">
                            <h2 class="section-title mb-4 aos-init" data-aos="fade-up">{{ __('Похожие посты') }}</h2>
                            <div class="row">
                                @foreach ($relatedPosts as $relatedPost)
                                    <div class="col-md-4 aos-init" data-aos="fade-right" data-aos-delay="100">
                                        <img src="{{ asset('storage/' . $relatedPost->preview_image) }}" alt="related post"
                                            class="post-thumbnail">
                                        <p class="post-category">{{ $relatedPost->category->title }}</p>
                                        <a href="{{ route('blog.show', $relatedPost->id) }}" class="text-decoration-none">
                                            <h5 class="post-title">{{ $relatedPost->title }}</h5>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </section>
                    @endif
                    <section id="comment-list" class="comment-list">
                        <h2 class="section-title mb-5 aos-init" data-aos="fade-up">{{ __('Комментарии') }} ({{ $post->comments->count() }})</h2>
                        <div class="container">
                            @foreach ($post->comments as $comment)
                                <div class="row pt-3 border-top" data-aos="fade-up">
                                    <div class="col-12 d-flex justify-content-between align-items-center px-0">
                                        <h3 class="fw-bold mb-3">{{ $comment->user->name }}</h3>
                                        <h5 class="fw-bold">{{ $comment->dateAsCarbon->diffForHumans() }}</h5>
                                    </div>
                                    <p>{{ $comment->message }}</p>
                                </div>
                            @endforeach
                        </div>
                    </section>

                    @auth
                    <section class="comment-section border-top pt-5">
                        <h2 class="section-title mb-5 aos-init" data-aos="fade-up">{{ __('Оставить комментарий') }}</h2>
                        <form action="{{ route('blog.comment.store', $post->id) }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="form-group col-12 aos-init" data-aos="fade-up">
                                    <label for="message" class="sr-only">{{ __('Комментарий') }}</label>
                                    <textarea name="message" id="comment" class="form-control"
                                        placeholder="{{ __('Комментарий') }}" rows="10"></textarea>
                                    @error('message')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 aos-init" data-aos="fade-up">
                                    <input type="submit" value="Опубликовать" class="btn btn-warning text-uppercase">
                                </div>
                            </div>
                        </form>
                    </section>
                    @endauth

                </div>
            </div>
        </div>
    </main>
@endsection
