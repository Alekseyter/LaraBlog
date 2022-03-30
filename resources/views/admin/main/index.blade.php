@extends('admin.layouts.base')

@section('page.title', __('Админ панель'))

@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row admin-dashboard">
                <div class="col-lg-3 col-6 dashboard-card">
                    <!-- small box -->
                    <a href="{{ route('admin.user') }}" class="text-decoration-none">
                        <div class="small-box bg-info">
                            <div class="inner py-4">
                                <p>{{ __('Пользователи') }}</p>
                                <h3>{{ $data['usersCount'] }}</h3>
                            </div>
                            <div class="icon">
                                <i class="nav-icon fas fa-users"></i>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6 dashboard-card">
                    <!-- small box -->
                    <a href="{{ route('admin.post') }}" class="text-decoration-none">
                        <div class="small-box bg-success">
                            <div class="inner py-4">
                                <p>{{ __('Посты') }}</p>
                                <h3>{{ $data['postsCount'] }}</h3>
                            </div>
                            <div class="icon">
                                <i class="nav-icon far fa-clipboard"></i>
                            </div>
                        </div>
                    </a>

                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6 dashboard-card">
                    <!-- small box -->
                    <a href="{{ route('admin.category') }}" class="text-decoration-none">
                        <div class="small-box bg-warning">
                            <div class="inner py-4">
                                <p>{{ __('Категории') }}</p>
                                <h3>{{ $data['categoriesCount'] }}</h3>
                            </div>
                            <div class="icon">
                                <i class="nav-icon fas fa-th-list"></i>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6 dashboard-card">
                    <!-- small box -->
                    <a href="{{ route('admin.tag') }}" class="text-decoration-none">
                        <div class="small-box bg-danger">
                            <div class="inner py-4">
                                <p>{{ __('Теги') }}</p>
                                <h3>{{ $data['tagsCount'] }}</h3>
                            </div>
                            <div class="icon">
                                <i class="nav-icon fas fa-tags"></i>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>

@endsection
