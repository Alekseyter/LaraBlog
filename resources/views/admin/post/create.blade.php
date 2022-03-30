@extends('admin.layouts.base')

@section( 'page.title', __('Создать пост') )

@section( 'dashboard.title', __('Создать пост') )

@section( 'content' )

    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row my-3">
            <div class="col-12 mb-3">
                <form action="{{ route('admin.post.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group col-md-6 px-2">
                        <input type="text" name="title" class="form-control" placeholder="{{ __('Название поста') }}" value="{{ old('title') }}">
                        @error('title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="row col-12 px-2">
                        <div class="form-group col-md-8">
                            <textarea name="content" id="summernote" class="bg-white">{{ old('content') }}</textarea>
                            @error('content')
                                <div class="text-danger mt-n4">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group form-group__image col-md-4">

                            <label>Изображение</label>
                            <div class="input-group mb-4">
                                <div class="custom-file w-100">
                                    <input type="file" class="custom-file-input" name="preview_image">
                                    <label class="custom-file-label">Добавьте изображение</label>
                                </div>
                                @error('preview_image')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <label>{{ __('Категория') }}</label>
                            <select name="category_id" class="form-control mb-4">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $category->id == old('category_id') ? 'selected' : '' }}>
                                        {{ $category->title }}
                                    </option>
                                @endforeach
                            </select>

                            <label>{{ __('Теги') }}</label>
                            <select class="select2 mb-4" name="tag_ids[]" multiple="multiple" data-placeholder="{{ __('Выберите теги') }}" style="width: 100%;">
                                @foreach ($tags as $tag)
                                    <option value="{{ $tag->id }}" {{ is_array(old('tag_ids')) && in_array($tag->id, old('tag_ids')) ? 'selected' : '' }}>
                                        {{ $tag->title }}
                                    </option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                    <div class="form-group d-flex px-2">
                        <input type="submit" class="btn btn-primary mr-3" value="{{ __('Создать') }}">
                        <a href="{{ url()->previous() }}" class="btn btn-secondary">{{ __('Отмена') }}</a>
                    </div>
                </form>
            </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

@endsection
