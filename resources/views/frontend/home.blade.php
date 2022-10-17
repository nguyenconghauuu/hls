@include('frontend.layouts.inc_header')
<style>
    .box-sm{ background: white}
    .panel-default { border-radius: 0;border-color: white;border: 0 !important;}
    .panel-heading { background-color: #fff !important;border: none}
    .title-nav {
        color: #000;
        text-transform: uppercase;
        font-size: 13px;
        font-weight: 500;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    .panel-body{ border: 0 !important;padding-top: 0!important;}
    .panel-group .panel { border: 0 !important;border-radius: 0!important;}
    .title_post_sub
    {
        color: #222;
        display: block;
        padding-bottom: 1px;
        padding-top: 1px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    .title-post a { color: #666; display: block; padding-bottom: 1px;  padding-top: 1px;  white-space: nowrap;  overflow: hidden; text-overflow: ellipsis;}
    .title-post a:hover {  color: #00a888 !important;}
    .title-new { text-transform: uppercase;font-size: 20px; text-align: center ;  border-bottom: 1px solid #dfdfdf;padding-bottom: 10px;}
    .title-footer { font-size: 20px;text-transform: uppercase;border-bottom: 2px solid #72c02c;padding-bottom: 15px;width: 90%}
    .fa-book
    {
        line-height: 50px;
        font-size: 24px;
        float: left;
        color: #fff;
        width: 50px;
        height: 50px;
        text-align: center;
        margin-right: 15px;
        display: inline-block;
        border-radius: 50%;
        background-color: #333333a3;
    }
    .fa-book:hover
    {
        background-color: #4285F4;
        cursor: pointer;
    }
    .fa-book:before {
        content: "\f02d";
        font-size: 100%;
        font-family: FontAwesome;
        font-style: normal;
        font-weight: normal;
        text-decoration: inherit;
    }
    /*.fa-book:before {*/
        /*content: "\f02d";*/
    /*}*/
    .carousel-control,.carousel-control:hover{
        opacity: 0;
    }
</style>
    <section style="background-color: #f1f1f16e">
        <div class="container">
            <div class="row clearfix">
                <div class="col-sm-12 box-sm" style="border: 1px solid #e7e7e7; margin-top: 20px;">
                    <div class="box-sm" style="">
                        <div class="box-sm-12">
                            
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <h4 style="padding-left: 15px;color: #4285f4;font-weight: bold;font-size: 14px;text-transform: uppercase"> Chương trình học ISTQB CƠ BẢN </h4>
                                @foreach($categorys as $key => $cate)
                                    {{--@if($cate->level == 2)--}}
                                    <div class="panel panel-default">

                                        <div class="panel-heading" role="tab" id="headingOne{{ $key }}">
                                            <h4 class="panel-title">
                                                <a role="button" style="color: #4285f4;font-weight: bold" data-toggle="collapse" data-parent="#accordion" href="#collapseOne{{ $key }}" class="title-nav" aria-expanded="true" aria-controls="collapseOne">
                                                    {{ $cate->cpo_name }}
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseOne{{$key}}" class="panel-collapse collapse {!!  $key == 0 ? 'in' : '' !!}" role="tabpanel" aria-labelledby="headingOne{{ $key }}">
                                            <div class="panel-body">
                                                <?php
                                                    $posts = DB::table('posts')
                                                        ->leftJoin('categoryposts', 'categoryposts.id', '=', 'posts.po_category_post_id')
                                                        ->select('posts.id','posts.po_title','posts.po_slug','posts.po_category_post_id','categoryposts.cpo_slug')
                                                        ->where('po_category_post_id',$cate->id)->orderBy('po_sort','ASC')->get();
                                                ?>
                                                @if($posts->count() > 0 )
                                                    <ul style="list-style: none;padding-left: 17px;">
                                                        @foreach($posts as $post)
                                                            <li><a class="title_post_sub" href="/bai-viet/{{ $cate->cpo_parent_id }}/{{ $post->po_slug }}/{{ $post->id }}" title="{{ $post->po_title }}" style="color: #000">{{ $post->po_title }}</a></li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </div>
                                        </div>

                                    </div>
                                    {{--@endif--}}
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>

{{--                <div class="col-sm-8" style="border: 1px solid #e7e7e7;">--}}
{{--                    <div class="box-sm" style="margin-left: -15px;margin-right: -15px;">--}}
{{--                        <div class="box-slide">--}}
{{--                            <div id="myCarousel" class="carousel slide" data-ride="carousel">--}}
{{--                                <!-- Indicators -->--}}
{{--                                <ol class="carousel-indicators">--}}
{{--                                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>--}}
{{--                                    <li data-target="#myCarousel" data-slide-to="1"></li>--}}
{{--                                    <li data-target="#myCarousel" data-slide-to="2"></li>--}}
{{--                                </ol>--}}
{{--                                <!-- Wrapper for slides -->--}}
{{--                                <div class="carousel-inner">--}}
{{--                                    <div class="item active">--}}
{{--                                        <img src="{{ asset('banner.jpg') }}" alt="Los Angeles" style="width:100%; height: 481px;">--}}
{{--                                    </div>--}}
{{--                                    <div class="item">--}}
{{--                                        <img src="{{ asset('banner3.jpg') }}" alt="Chicago" style="width:100%;height: 481px;">--}}
{{--                                    </div>--}}
{{--                                    <div class="item">--}}
{{--                                        <img src="{{ asset('banner2.png') }}" alt="New york" style="width:100%;height: 481px;">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <!-- Left and right controls -->--}}
{{--                                <a class="left carousel-control" href="#myCarousel" data-slide="prev">--}}
{{--                                    <span class="glyphicon glyphicon-chevron-left"></span>--}}
{{--                                    <span class="sr-only">Previous</span>--}}
{{--                                </a>--}}
{{--                                <a class="right carousel-control" href="#myCarousel" data-slide="next">--}}
{{--                                    <span class="glyphicon glyphicon-chevron-right"></span>--}}
{{--                                    <span class="sr-only">Next</span>--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

            </div>

            <div class="row clearfix"  >
                <div class="col-sm-4" style="background: white;margin-top: 20px;padding-top: 10px;" >
                    <div class="panel panel-default">
                        <div class="panel-body title-post">
                            <h2 class="title-new">  Giải thích thuật ngữ  </h2>
                            <ul style="list-style: none">
                                @foreach($postHot as $key => $hot)
                                    <?php
                                        $h_id = $hot->po_category_post_id;
                                        $h_cate = \App\CategoryPosts::findOrFail($h_id);
                                    ?>
                                    <li><a href="/bai-viet/{{ $h_cate->cpo_parent_id }}/{{ $hot->po_slug }}/{{ $hot->id }}" style="color: #0053f9"> {{ $key + 1 }}. {{  $hot->po_title }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4" style="background: white;margin-top: 20px;padding-top: 10px;">
                    <div class="panel panel-default">
                        <div class="panel-body title-post">
                            <h2 class="title-new">  bài viết mới</h2>
                            <ul style="list-style: none">
                                @foreach($postNew as $key => $new)
                                    <?php
                                    $h_id = $new->po_category_post_id;
                                    $h_cate = \App\CategoryPosts::findOrFail($h_id);
                                    ?>
                                    <li><a href="/bai-viet/{{ $h_cate->cpo_parent_id }}/{{ $new->po_slug }}/{{ $new->id }}" style="color: #0053f9"> {{ $key + 1 }}. {{ $new->po_title }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4" style="background: white;margin-top: 20px;padding-top: 10px;">
                    <div class="panel panel-default">
                        <div class="panel-body title-post">
                            <h2 class="title-new"> Bài viết liên quan </h2>
                            <ul style="list-style: none">
                                @foreach($postAbout as $key => $new)
                                    <li><a href="{{ route('thongtin',[$new->id,$new->po_slug]) }}" style="color: #0053f9"> {{ $key + 1 }}. {{ $new->po_title }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="background: white;padding: 20px;margin-top: 50px;margin-bottom: 50px;">
                <div class="main-content ">
                    <div class="box-title text-center">
                        <h3 class="txt-title">Chúng tôi cung cấp gì cho bạn</h3>
                        <p class="txt"> Trang web ôn luyện thi ISTQB miễn phí </p>
                    </div>
                    <div class="row main-provided">
                        <div class="col-md-4">
                            <div class="content-boxes-v5">
                <span class="rounded-x icon-layers">
                <i class="fa fa-book" aria-hidden="true"></i>
                </span>
                                <div class="overflow-h">
                                    <h3 class="no-top-space">Tài nguyên miễn phí</h3>
                                    <p>Tài nguyên trên trang web được sử dụng miễn phí bởi người dùng</p>
                                </div>
                            </div>
                            <div class="content-boxes-v5">
                <span class="rounded-x icon-settings">
                <i class="fa fa-book" aria-hidden="true"></i>
                </span>
                                <div class="overflow-h">
                                    <h3 class="no-top-space"> Giải thích các thuật ngữ. </h3>
                                    <p> Các thuật ngữ sẽ giúp bạn dễ dàng tiếp cận nội dung bài học. </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="content-boxes-v5">
                <span class="rounded-x icon-user-1 ">
                <i class="fa fa-book" aria-hidden="true"></i>
                </span>
                                <div class="overflow-h">
                                    <h3 class="no-top-space"> Các bài học chất lượng </h3>
                                    <p> Các bài học được xây dựng từ đội ngũ chuyên nghiệp .</p>
                                </div>
                            </div>
                            <div class="content-boxes-v5">
                <span class="rounded-x icon-earphones-alt ">
                <i class="fa fa-book" aria-hidden="true"></i>
                </span>
                                <div class="overflow-h">
                                    <h3 class="no-top-space">Diễn đàn lớn mạnh</h3>
                                    <p>Bạn có thể thảo luận, hỏi đáp tại diễn đàn của chúng tôi qua các kênh youtube và facebook</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="content-boxes-v5">
                <span class="rounded-x icon-wrench">
                <i class="fa fa-book" aria-hidden="true"></i>
                </span>
                                <div class="overflow-h">
                                    <h3 class="no-top-space">Nội dung cập nhật</h3>
                                    <p>Nội dung trên web được cập nhật liên tục hàng ngày bởi đội ngũ giáo viên giỏi.</p>
                                </div>
                            </div>
                            <div class="content-boxes-v5 ">
                <span class="rounded-x icon-star">
                <i class="fa fa-book" aria-hidden="true"></i>
                </span>
                                <div class="overflow-h">
                                    <h3 class="no-top-space">Giao diện thân thiện</h3>
                                    <p>Trang web luôn lắng nghe góp ý để đổi mới trang web phục vụ các bạn học sinh, giáo viên, sinh viên cả nước</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/end row-->
                </div>
            </div>
        </div>
    </section>
    <section id="footer" style="background-color: #272727;min-height: 200px;color: white;padding-top: 20px;padding-bottom: 20px;">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <a href="/" style="padding-top: 10px;padding-bottom: 10px;display: block;font-size: 20px;letter-spacing: 3px;color: #555555;">
                        <img src="{{ asset('logo2.png') }}" alt="" style="width: 100%;height: auto;">
                    </a>
                </div>
                <div class="col-sm-3">
                    <h2 class="title-footer"> Danh mục nổi bật</h2>
                    <div>
                        <ul>
                            @foreach($categoryLevel1 as $cate)
                                <li><a href="/danh-muc/{{ $cate->cpo_slug }}/{{ $cate->id }}" style="color: white;">{{ $cate->cpo_name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
                    <h2 class="title-footer"> Lời cảm ơn</h2>
                    <div>
                        <p> Cảm ơn sự đóng góp cũng như ủng hộ của toàn thể các bạn ! Chúng tôi sẽ cố gắng hoàn thiện và cải tiến website để
                            mang lại sự trải nghiệm tốt nhất cho các bạn! .
                        </p>
                    </div>
                </div>
            
                <div class="col-sm-3">
                    <h2 class="title-footer">Liên hệ với chúng tôi</h2>
                    <span><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i> Hà Nội</span><br>
                    <span style="display: inline-block;padding: 5px 0"><i class="	glyphicon glyphicon-phone-alt"></i> Phone: 0988506404</span><br>
                    <span><i class="glyphicon glyphicon-envelope"></i> Email: <a href="mailto:hoangnamng404@gmail.com" style="color: #fb9f45">hoangnamng404@gmail.com</a></span>
                </div>
            </div>
        </div>
    </section>
</div>ơn
@include('frontend.layouts.inc_footer')
