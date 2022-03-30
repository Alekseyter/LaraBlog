@extends('admin.layouts.base')

@section( 'page.title', $post->title )

@section( 'dashboard.title', $post->title )

@section( 'dashboard.title.button' )
    <a href="{{ route('admin.post.edit', $post->id) }}" title="{{ __('Редактировать') }}" class="text-success">
        <i class="fas fa-pencil-alt"></i>
    </a>
@endsection

@section('content')

    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-4">
                <div class="card mb-4 card-view">
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                      <table class="table table-hover text-nowrap">
                        <tbody>
                            <tr>
                                <td>ID</td>
                                <td>{{ $post->id }}</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>{{ __('Название') }}</td>
                                <td>{{ $post->title }}</td>
                                <td>
                                    <form action="{{ route('admin.post.delete', $post->id) }}" method="POST" class="m-0">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" title="{{ __('Удалить') }}" class="text-danger border-0 bg-transparent">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <a href="{{ route('admin.post') }}" class="btn btn-info"><i class="fas fa-arrow-left mr-2"></i>{{ __('К списку постов') }}</a>
            </div>
        </div>

        <div class="row">
            {{ $post->content }}
        </div>
      </div><!-- /.container-fluid -->
    </section>

@endsection
