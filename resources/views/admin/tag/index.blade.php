@extends('admin.layouts.base')

@section( 'page.title', __('Теги') )

@section( 'dashboard.title', __('Теги') )

@section('content')

    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row my-3">
            <div class="col-md-4 mb-3">
                <form action="{{ route('admin.tag.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="title" class="form-control" placeholder="{{ __('Название тега') }}">
                        @error('title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <input type="submit" class="btn btn-primary" value="{{ __('Добавить') }}">
                </form>
            </div>
            <div class="col-md-6 offset-md-2">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                      <table class="table table-hover text-nowrap">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>{{ __('Название') }}</th>
                            <th class="text-center" colspan="3"><i class="far fa-eye"></i> / <i class="fas fa-pencil-alt"></i> / <i class="fas fa-trash"></i></th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($tags as $tag)
                                <tr>
                                    <td>{{ $tag->id }}</td>
                                    <td>{{ $tag->title }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.tag.show', $tag->id) }}" title="{{ __('Посмотреть') }}">
                                            <i class="far fa-eye"></i>
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.tag.edit', $tag->id) }}" title="{{ __('Редактировать') }}" class="text-success">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <form action="{{ route('admin.tag.delete', $tag->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" title="{{ __('Удалить') }}" class="text-danger border-0 bg-transparent ml-n3">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

@endsection
