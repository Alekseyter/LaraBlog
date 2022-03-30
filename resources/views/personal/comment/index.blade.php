@extends('personal.layouts.base')

@section('page.title', __('Комментарии'))

@section('dashboard.title', __('Комментарии'))

@section('content')

    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row my-3">
                <div class="col-md-6">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>{{ __('Название') }}</th>
                                        <th class="text-center" colspan="2"><i class="fas fa-pencil-alt"></i> / <i
                                                class="fas fa-trash"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($comments as $comment)
                                        <tr>
                                            <td>{{ $comment->id }}</td>
                                            <td>{{ $comment->message }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('personal.comment.edit', $comment->id) }}" title="{{ __('Редактировать') }}" class="text-success">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                            </td>
                                            <td class="text-center">
                                                <form action="{{ route('personal.comment.delete', $comment->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" title="{{ __('Удалить') }}"
                                                        class="text-danger border-0 bg-transparent ml-n3">
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
