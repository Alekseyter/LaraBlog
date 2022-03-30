@extends('admin.layouts.base')

@section( 'page.title', __('Пользователь "') . $user->name . '"' )

@section( 'dashboard.title', __('Пользователь "') . $user->name . '"' )

@section( 'dashboard.title.button' )
    <a href="{{ route('admin.user.edit', $user->id) }}" title="{{ __('Редактировать') }}" class="text-success">
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
                                <td>{{ $user->id }}</td>
                                <td>
                                    <form action="{{ route('admin.user.delete', $user->id) }}" method="POST" class="m-0">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" title="{{ __('Удалить пользователя') }}" class="text-danger border-0 bg-transparent">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            <tr>
                                <td>{{ __('Имя') }}</td>
                                <td>{{ $user->name }}</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>E-mail</td>
                                <td>{{ $user->email }}</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Роль</td>
                                <td>
                                    @foreach ($roles as $id => $role)
                                        @if ($id === $user->role)
                                            {{ $role }}
                                        @endif
                                    @endforeach
                                </td>
                                <td></td>
                            </tr>
                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <a href="{{ route('admin.user') }}" class="btn btn-info"><i class="fas fa-arrow-left mr-2"></i>{{ __('К списку') }}</a>
            </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

@endsection
