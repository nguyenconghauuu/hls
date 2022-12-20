@extends('admin.layouts.app')
@section('title',' Trang quản trị admin  ')
@section('main-content')
    <section class="content-header">
        <h1>
            Trang quản trị admin
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            @include('admin.notification.index')
            <h3> XIN CHÀO ADMIN</h3>
            <div class="box-body border mr-t-10">
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-red"><i class="fa fa-list"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Danh mục</span>
                                <span class="info-box-number">{{ $totalCategory ?? 0 }}</span>
                                <a href="{{ route('admin.categorypost.index') }}">Xem thêm</a>
                            </div>

                        </div>

                    </div>


                    <div class="clearfix visible-sm-block"></div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Câu hỏi</span>
                                <span class="info-box-number">{{ $totalQuestions ?? 0 }}</span>
                                <a href="{{ route('admin.questions.index') }}">Xem thêm</a>
                            </div>

                        </div>

                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Thành viên</span>
                                <span class="info-box-number">{{ $totalUser ?? 0 }}</span>
                                <a href="{{ route('admin.users.index') }}">Xem thêm</a>
                            </div>

                        </div>

                    </div>

                </div>
            </div>

        </div>
        <!-- /.box -->
    </section>
@endsection
