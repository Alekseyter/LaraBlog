@extends('personal.layouts.base')

@section('page.title', __('Понравившиеся посты'))

@section('dashboard.title', __('Понравившиеся посты'))

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
                                        <th class="text-center" colspan="2"><i class="far fa-eye"></i> / <i class="fas fa-trash"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($posts as $post)
                                        <tr>
                                            <td>{{ $post->id }}</td>
                                            <td>{{ $post->title }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('blog.show', $post->id) }}"
                                                    title="{{ __('Посмотреть') }}"
                                                    target="_blank">
                                                    <i class="far fa-eye"></i>
                                                </a>
                                            </td>
                                            <td class="text-center">
                                                <form action="{{ route('personal.like.delete', $post->id) }}" method="POST">
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
