@extends('admin.layouts.base')

@section( 'page.title', __('Пользователи') )

@section( 'dashboard.title', __('Пользователи') )

@section('content')

    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row my-3">
            <div class="col-md-4 mb-3">
                <form action="{{ route('admin.user.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="{{ __('Введите имя') }}" value="{{ old('name') }}">
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <input type="email" name="email" class="form-control mt-3" placeholder="{{ __('Ваш E-mail') }}" value="{{ old('email') }}">
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <input type="password" name="password" class="form-control mt-3 mb-5" placeholder="{{ __('Придумайте пароль') }}">
                        @error('password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <label>{{ __('Выберите роль') }}</label>
                        <select name="role" class="form-control mb-4">
                            @foreach ($roles as $id => $role)
                                <option value="{{ $id }}" {{ $id == old('role') ? 'selected' : '' }}>
                                    {{ $role }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <input type="submit" class="btn btn-primary" value="{{ __('Создать пользователя') }}">
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
                            <th>{{ __('Имя') }}</th>
                            <th>{{ __('Роль') }}</th>
                            <th class="text-center" colspan="3"><i class="far fa-eye"></i> / <i class="fas fa-pencil-alt"></i> / <i class="fas fa-trash"></i></th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>
                                        @foreach ($roles as $id => $role)
                                            @if ($id === $user->role)
                                                {{ $role }}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.user.show', $user->id) }}" title="{{ __('Посмотреть') }}">
                                            <i class="far fa-eye"></i>
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.user.edit', $user->id) }}" title="{{ __('Редактировать') }}" class="text-success">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <form action="{{ route('admin.user.delete', $user->id) }}" method="POST">
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
