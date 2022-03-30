@extends( 'admin.layouts.base' )

@section( 'page.title', __('Редактировать пользователя') )

@section( 'dashboard.title', __('Редактировать пользователя "' . $user->name . '"') )

@section( 'content' )

    <section class="content my-3">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-4">
                <form action="{{ route('admin.user.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="{{ __('Введите имя') }}" value="{{ $user->name }}">
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <input type="email" name="email" class="form-control mt-3" placeholder="{{ __('Ваш E-mail') }}" value="{{ $user->email }}">
                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <label class="mt-5">{{ __('Выберите роль') }}</label>
                        <select name="role" class="form-control mb-4">
                            @foreach ($roles as $id => $role)
                                <option value="{{ $id }}" {{ $id == $user->role ? 'selected' : '' }}>
                                    {{ $role }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="d-flex">
                        <input type="submit" class="btn btn-primary mr-3" value="{{ __('Изменить данные') }}">
                        <a href="{{ url()->previous() }}" class="btn btn-secondary">{{ __('Отмена') }}</a>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>

@endsection
