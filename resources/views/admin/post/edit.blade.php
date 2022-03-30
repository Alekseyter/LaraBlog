@extends('admin.layouts.base')

@section( 'page.title', __('Редактировать пост') )

@section( 'dashboard.title', __('Редактировать пост "' . $post->title . '"') )

@section( 'dashboard.title.button' )
    <a href="{{ route('blog.show', $post->id) }}" target="_blank" class="btn btn-info btn-sm">{{ __('Предпросмотр') }}</a>
@endsection

@section('content')

    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row my-3">
            <div class="col-12 mb-3">
                <form action="{{ route('admin.post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group col-md-6 px-0">
                        <input type="text" name="title" class="form-control" placeholder="{{ __('Название поста') }}" value="{{ $post->title }}">
                        @error('title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="row col-12 px-0">
                        <div class="form-group col-md-8">
                            <textarea name="content" id="summernote" class="bg-white">{{ $post->content }}</textarea>
                            @error('content')
                                <div class="text-danger mt-n4">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group form-group__image col-md-4">

                            <label>Изображение</label>
                            <div class="input-group mb-4">
                                <img src="{{ url('storage/' . $post->preview_image) }}" alt="preview_image" class="w-75 mb-2">
                                <div class="custom-file w-100">
                                    <input type="file" class="custom-file-input" name="preview_image">
                                    <label class="custom-file-label">Заменить изображение</label>
                                </div>
                                @error('preview_image')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <label>{{ __('Категория') }}</label>
                            <select name="category_id" class="form-control mb-4">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $category->id == $post->category_id ? 'selected' : '' }}>
                                        {{ $category->title }}
                                    </option>
                                @endforeach
                            </select>

                            <label>{{ __('Теги') }}</label>
                            <select class="select2 mb-4" name="tag_ids[]" multiple="multiple" data-placeholder="{{ __('Выберите теги') }}" style="width: 100%;">
                                @foreach ($tags as $tag)
                                    <option value="{{ $tag->id }}" {{ is_array($post->tags->pluck('id')->toArray()) && in_array($tag->id, $post->tags->pluck('id')->toArray()) ? 'selected' : '' }}>
                                        {{ $tag->title }}
                                    </option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                    <div class="form-group d-flex">
                        <input type="submit" class="btn btn-primary mr-3" value="{{ __('Сохранить') }}">
                        <a href="{{ url()->previous() }}" class="btn btn-secondary">{{ __('Отмена') }}</a>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>

@endsection
