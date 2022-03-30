@extends('personal.layouts.base')

@section('page.title', __('Личный кабинет'))

@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row admin-dashboard">
                <div class="col-lg-3 col-6 dashboard-card">
                    <!-- small box -->
                    <a href="{{ route('personal.like') }}" class="text-decoration-none">
                        <div class="small-box bg-info">
                            <div class="inner py-4">
                                <p>{{ __('Понравившиеся посты') }}</p>
                                <h3>{{ $data['likesCount'] }}</h3>
                            </div>
                            <div class="icon">
                                <i class="nav-icon far fa-heart"></i>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6 dashboard-card">
                    <!-- small box -->
                    <a href="{{ route('personal.comment') }}" class="text-decoration-none">
                        <div class="small-box bg-success">
                            <div class="inner py-4">
                                <p>{{ __('Комментарии') }}</p>
                                <h3>{{ $data['commentsCount'] }}</h3>
                            </div>
                            <div class="icon">
                                <i class="nav-icon far fa-comments"></i>
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
