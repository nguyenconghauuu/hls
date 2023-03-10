<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Content</title>
</head>
<style>
    html,
    body {
        margin: 0;
        padding: 0;
        font-family: 'Fragment Mono', monospace;
    }

    .header {
        width: 100%;
        height: auto;
        display: flex;
    }

    .navbar {
        width: 100%;
    }
    


    /*  */
    .main {
        display: flex;
        width: 100%;

    }

    .slide-content {
        width: 21%;
        height: auto;
        padding:20px 0px 0px 20px;
        display: flex;
        flex-direction: column;
    }

    .slide-content a {
        text-decoration: none;
        color: #000;
        display: block;
    }

    .container {
        display: flex;
        width: 100%;
        height: auto;
        margin-top: 20px;
    }

    .content {
        width: 90%;
        height: auto;
        padding: 20px;
        display: flex;
        flex-direction: column;
    }

    .page{
        margin: auto;
    }
    /*  */
   
    .list-cate-sidebar .active {
        color: #28a745;
    }

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
        color: #666;
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
</style>
<script>
    var count = 1800;
    function countDown(){
        var timer = document.getElementById("timer");
        if(count > 0){
            count--;
            timer.innerHTML = " <i class=\"fa fa-clock-o\" aria-hidden=\"true\"></i>  <b>"+secondsToHms(count)+"</b> gi??y ";
            setTimeout("countDown()", 1000);
        }else{
            document.getElementById("myForm").submit();
        }
    }
    function secondsToHms(d) {
        d = Number(d);
        var h = Math.floor(d / 3600);
        var m = Math.floor(d % 3600 / 60);
        var s = Math.floor(d % 3600 % 60);

        var hDisplay = h > 0 ? h + (h == 1 ? " gi??? - " : " gi??? ") : "";
        var mDisplay = m > 0 ? m + (m == 1 ? " ph??t " : " ph??t ") : "";
        var sDisplay = s > 0 ? s + (s == 1 ? " gi??y " : " ") : "";
        return hDisplay + mDisplay + sDisplay;
    }
</script>
<body>
@include('frontend.component._inc_header')
<div class="main">
    <div class="slide-content">
        @if (isset($categoyParent) && $categoyParent)
            <div style="text-align:center;background-color:#28a745;color:white" class="shadow-none p-3 mb-5  rounded">{{ $categoyParent->cpo_name }}</div>
        @else
            <div style="text-align:center;background-color:#28a745;color:white" class="shadow-none p-3 mb-5  rounded">{{ $category->cpo_name }}</div>
        @endif

        <div style="text-align:left; margin-top: -40px;" class="collapse show shadow p-3 mb-5 bg-white rounded" >
            <div class="card-body list-cate-sidebar">
                @foreach($CategoryChildrens as $key => $childrenCate)
                    <a class="{{ $childrenCate->id == $id ? 'active' : '' }}" href="/danh-muc/{{ $childrenCate->cpo_slug }}/{{ $childrenCate->id }}">{{ $childrenCate->cpo_name }}</a>
                @endforeach
            </div>
        </div>

    </div>
    <div class="container shadow p-3 mb-5 bg-white rounded" style="background-color: whitesmoke;">
        <div class="content">
            <div id="box-content">
                <div style="padding: 20px ;border: 1px solid #dedede;margin-bottom: 10px;background-color: white">
                    <h2> L??m b??i thi  </h2>
                    <div class="row">
                        <style>
                            .wrap {
                                padding: 6px 14px;
                                border-radius: 5px;
                                border: 1px solid #ddd;
                                font-size: 12px;
                                text-align: center;
                                position: fixed;
                                background-color: #4CAF50;
                                right: 31px;
                                top: 100px;
                                color: white;
                                font-weight: bold;
                            }
                        </style>

                        <form id="myForm" action="" method="POST">
                            <div  class="col-sm-12" >
                                @foreach($cauHoi as $key => $item)

                                    <div style="padding: 0 20px;background-color: white">
                                        <h4 style="display: inline-flex;font-weight: bold"> C??u {{  $key + 1 }} :  </h4>
                                        <p readonly='true' class="removeStyle" style="width: 100%;">{!! $item->qs_name  !!}</p>
                                        @if ($item->qs_thunbar)
                                            <img src="/uploads/questions/{{ $item->qs_thunbar }}" alt="" class="img img-responsive" id="blah" title=" Logo " style="width: 100%;height: 258px;border: 1px solid #dedede">
                                        @endif
                                        <div class="form-group clearfix" style="margin-top:10px">
                                            <div class="col-sm-10 list-answer">
                                                @if( $item->qs_answer1)
                                                    <div style="border:1px solid #dfdfdf;padding: 5px;border-radius: 5px;margin-bottom: 2px;" class="box-answer">
                                                        <input type="radio" class="input-dapan" value="qs_answer1" name="dapan-{{ $item->id }}"> &nbsp
                                                        {{ $item->qs_answer1 }}
                                                    </div>
                                                @endif
                                                @if( $item->qs_answer2)
                                                    <div style="border:1px solid #dfdfdf;padding: 5px;border-radius: 5px;margin-bottom: 2px;" class="box-answer">
                                                        <input type="radio" class="input-dapan" value="qs_answer2" name="dapan-{{ $item->id }}"> &nbsp
                                                        {{ $item->qs_answer2 }}
                                                    </div>
                                                @endif
                                                @if( $item->qs_answer3)
                                                    <div style="border:1px solid #dfdfdf;padding: 5px;border-radius: 5px;margin-bottom: 2px;" class="box-answer">
                                                        <input type="radio" class="input-dapan" value="qs_answer3" name="dapan-{{ $item->id }}"> &nbsp
                                                        {{ $item->qs_answer3 }}
                                                    </div>
                                                @endif
                                                @if( $item->qs_answer4)
                                                    <div style="border:1px solid #dfdfdf;padding: 5px;border-radius: 5px;margin-bottom: 2px;" class="box-answer">
                                                        <input type="radio" class="input-dapan" value="qs_answer4" name="dapan-{{ $item->id }}"> &nbsp
                                                        {{ $item->qs_answer4 }}
                                                    </div>
                                                @endif
                                                @if( $item->qs_answer5)
                                                    <div style="border:1px solid #dfdfdf;padding: 5px;border-radius: 5px;margin-bottom: 2px;" class="box-answer">
                                                        <input type="radio" class="input-dapan" value="qs_answer5"  name="dapan-{{ $item->id }}"> &nbsp
                                                        {{ $item->qs_answer5 }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <!--/ end -->
                                @endforeach
                            </div>

                            <div class="wrap">
                                <p id="timer" style="margin-bottom: 0"><script type="text/javascript">countDown();</script></p>
                            </div>
                            <input type="hidden" name="_token" value="{{ csrf_token()  }}">
                            <button type="submit" style="position: fixed;right: 30px;top: 50%;transform: translateY(50%);padding:6px 14px;background-color: #4CAF50;color: white;font-weight: bold" class="btn btn-xs btn-default"> N???p b??i </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
<div class="footer" style="padding: 20px ; width: 100%;
    height: auto;
    display: flex;
    flex-direction: column;
    background-color: rgb(2, 2, 2);
    text-align: center;
    color: white;">
        <p> Homelearningsoftware ???????c t???i ??u h??a cho vi???c h???c t???p. C??c v?? d??? c?? th??? ???????c ????n gi???n h??a ????? c???i thi???n kh???
            n??ng ?????c v?? hi???u c?? b???n. C??c h?????ng d???n, t??i li???u tham kh???o nh??ng ch??ng t??i kh??ng th??? ?????m b???o t??nh ch??nh x??c
            ho??n to??n c???a t???t c??? n???i dung. Trong khi s??? d???ng trang web n??y, b???n ?????ng ?? ???? ?????c v?? ch???p nh???n c??c ??i???u
            kho???n s??? d???ng, cookie v?? ch??nh s??ch b???o m???t c???a ch??ng t??i.
            </p>
            <p>Copyright by Nam & Hau</p>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>


</html>
