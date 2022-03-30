@extends( 'admin.layouts.base' )

@section( 'page.title', __('Редактировать категорию') )

@section( 'dashboard.title', __('Редактировать категорию "' . $category->title . '"') )

@section( 'content' )

    <section class="content my-3">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-4">
                <form action="{{ route('admin.category.update', $category->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <input type="text" name="title" class="form-control" placeholder="{{ __('Название категории') }}" value="{{ $category->title }}">
                        @error('title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="d-flex">
                        <input type="submit" class="btn btn-primary mr-3" value="{{ __('Обновить') }}">
                        <a href="{{ url()->previous() }}" class="btn btn-secondary">{{ __('Отмена') }}</a>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>

@endsection
