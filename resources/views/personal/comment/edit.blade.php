@extends( 'personal.layouts.base' )

@section( 'page.title', __('Редактировать комментарий') )

@section( 'dashboard.title', __('Редактировать комментарий') )

@section( 'content' )

    <section class="content my-3">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-4">
                <form action="{{ route('personal.comment.update', $comment->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <textarea class="form-control" name="message" cols="60" rows="10">{{ $comment->message }}</textarea>
                        @error('message')
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
