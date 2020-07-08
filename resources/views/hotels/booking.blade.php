@extends('layouts.app')
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hệ thống đặt phòng khách sạn</title>
    <link rel="stylesheet" type="text/css" href="{{URL::asset('/css/room-bookings.css')}}" />
{{--    <link rel="stylesheet" href="{{URL::asset('/Utilities/bootstrap-3.3.5-dist/css/bootstrap.min.css')}}">--}}
{{--    <script src="{{URL::asset('/Utilities/jQuery-1.x/jquery-1.11.3.min.js')}}"></script>--}}
{{--    <script src="{{URL::asset('/Utilities/bootstrap-3.3.5-dist/js/bootstrap.min.js')}}"></script>--}}

    <!-- Start WOWSlider.com HEAD section -->
{{--    <link rel="stylesheet" type="text/css" href="{{URL::asset('/Utilities/slideshow/slideshow2/engine1/style.css')}}" />--}}
{{--    <script type="text/javascript" src="{{URL::asset('/Utilities/slideshow/slideshow2/engine1/jquery.js')}}"></script>--}}
    <!-- End WOWSlider.com HEAD section -->


    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script>

        $(document).ready(function () {
            //lay' ten locations o? trang search-hotels, 1 so' bien' dung chung ten da~ luu voi trang homepage
//          $('#autocomplete').val(localStorage.index_tmp_name);
            $('.name-of-location').text(localStorage.index_tmp_name);
            $('#date1').val(localStorage.searchhotels_tmp_checkin);
            $('#date2').val(localStorage.searchhotels_tmp_checkout);
//            $('#loaiphong select').val(localStorage.index_tmp_typeofroom);
            $('.name-of-hotel').text(localStorage.searchhotels_tmp_nameofhotel);
            $('.address-of-hotel').text(localStorage.searchhotels_tmp_addofhotel);
            // xac dinh vi tri tren Google map, chi thay doi dia chi & cố định tại Ninh Bình
            $('#right-infoTabs iframe').attr('src', 'https://maps.google.com/maps?hl=en&q=' + localStorage.searchhotels_tmp_addofhotel_2 + '&ie=UTF8&t=roadmap&z=14&iwloc=B&output=embed');
            // sau khi load xong thi check user da~ login hay chua
            // phai them delay thi moi' kich hoat duoc localStorage + id tu` file header1
//      se~ check + load sau khi load xong part-header1.html
//      bien' localStorage.check_login luu tai file user-login
            var timer;
//      neu thoi gian load body nhieu hon delay thi co the xay ra loi
            var delay = 1000;
            timer = setTimeout(function () {
                if (localStorage.check_login === 'true') {
//                    alert('DA DANG NHAP');
                    $('#welcome').fadeIn(10);
                    $('#signup-signin').fadeOut(10);
                } else {
                    $('#welcome').fadeOut(10);
                    $('#signup-signin').fadeIn(10);
                }
            }, delay);
        });
    </script>

</head>

@section('content')

    <div style="margin:auto; margin-left:3%" >
        <div class="row">
            <div class="col-md-6" style="margin-left: 0%; width: 52%">
{{--            <div id="aboutHotel" class="container" style="background-color: rgb(246,245,245);  margin: 0; padding: 0">--}}
{{--                <div id="left-aboutHotel"--}}
{{--                     style="margin-bottom: -20px;width: 60%; float: left; position: relative; background-color: white">--}}
{{--                    <div class="tmp-left-aboutHotel" style="display: none;"></div>--}}
                    <!-- Start WOWSlider.com BODY section -->

                    <div id="wowslider-container1" style="margin: 0;">
                        <div style="position: absolute; z-index: 1000; color: white; text-shadow: 1px 0px black; margin-left: 50px;bottom: 45px">
                            <span style="font-weight: bolder; font-size: 30px" class="name-of-hotel">{{ $room->Type }}</span><br/>
                            <div style="font-size: 15px">
            <span class="address-of-hotel">

            </span>
                            </div>
                        </div>
                        <div class="ws_images" style="margin-top: 70px">
                            <ul>
                                @foreach ($room_photos as $Photo)
                                    <li>
                                        <img src="{{$Photo->path}}" alt="" title="" id="{{$Photo->id}}"  style="width: 100%"/></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="ws_bullets">
                            <div>
                            </div>
                        </div>
                        <div class="ws_script" style="position:absolute;left:-99%"><a href="http://wowslider.net">jquery slider</a> by WOWSlider.com v8.8</div>
                        <div class="ws_shadow"></div>
                    </div>

               <div class="panel panel-primary" style="margin-top: 1%;    ">
                        <div class="panel-heading">
                            <h3 class="panel-title">Chi tiết Phòng  khách sạn:</h3>
                        </div>
                        <div class="panel panel-body">
                            <!--<div id="left-infoTabs" style="width: 55%; float: left">-->

                            <!--<div style="height: 400px; width: 100%">-->
                            <div class="container-fluid" style="width: 100%; border-bottom: 1px solid rgb(238,238,238)">
                            </div>
                            <div id="description" class="container"
                                 style="width: 85%; margin-left: 20px;font-family: 'Times New Roman'">
                                <div class="title" style="font-family: 'Times New Roman';font-size: 20px"><b>Kích
                                        thước phòng
                                        :</b></div>
                                <div style="font-size: 18px">
                                    <svg class="bk-icon -iconset-checkmark" fill="" size="small" width="16"
                                         height="16"
                                         viewBox="0 0 128 128">
                                        <path d="M52 96a4 4 0 0 1-2.8-1.2l-24-24a4 4 0 0 1 5.6-5.6L52 86.3l45.2-45.1a4 4 0 1 1 5.6 5.6l-48 48A4 4 0 0 1 52 96z"></path>
                                    </svg>{{$room->BedOption}} <i class="fas fa-bed"
                                                                  style="font-size:30px;color:lightblue;text-shadow:2px 2px 4px #000000;"></i>
                                </div>
                                <div style="font-size: 18px">
                                    <svg class="bk-icon -iconset-checkmark" fill="" size="small" width="16"
                                         height="16"
                                         viewBox="0 0 128 128">
                                        <path d="M52 96a4 4 0 0 1-2.8-1.2l-24-24a4 4 0 0 1 5.6-5.6L52 86.3l45.2-45.1a4 4 0 1 1 5.6 5.6l-48 48A4 4 0 0 1 52 96z"></path>
                                    </svg>
                                    Phòng {{$room->Capacity}} người này có ban công, máy lạnh và sân trong.
                                </div>
                                <div class="title" style="font-family: 'Times New Roman';font-size: 20px"><b>Hướng
                                        tầm nhìn
                                        :</b></div>
                                <div style="font-size: 18px;font-family: 'Times New Roman'">
                                    <svg class="bk-icon -iconset-checkmark" fill="" size="small" width="16"
                                         height="16"
                                         viewBox="0 0 128 128">
                                        <path d="M52 96a4 4 0 0 1-2.8-1.2l-24-24a4 4 0 0 1 5.6-5.6L52 86.3l45.2-45.1a4 4 0 1 1 5.6 5.6l-48 48A4 4 0 0 1 52 96z"></path>
                                    </svg> {{$room->View}}</div>
                                <br>
                                <div class="content" style="font-family: 'Times New Roman';font-size: 20px"><b>Tiện Nghi Phòng :</b>
                                    <div>
                                        <svg class="bk-icon -iconset-checkmark" fill="" size="small" width="16" height="16" viewBox="0 0 128 128">
                                            <path d="M52 96a4 4 0 0 1-2.8-1.2l-24-24a4 4 0 0 1 5.6-5.6L52 86.3l45.2-45.1a4 4 0 1 1 5.6 5.6l-48 48A4 4 0 0 1 52 96z"></path>
                                        </svg>Ga trải giường
                                    </div>
                                    <div>
                                        <svg class="bk-icon -iconset-checkmark" fill="" size="small" width="16" height="16" viewBox="0 0 128 128">
                                            <path d="M52 96a4 4 0 0 1-2.8-1.2l-24-24a4 4 0 0 1 5.6-5.6L52 86.3l45.2-45.1a4 4 0 1 1 5.6 5.6l-48 48A4 4 0 0 1 52 96z"></path>
                                        </svg>Tủ lạnh hoặc minibar
                                    </div>
                                    <div>
                                        <svg class="bk-icon -iconset-checkmark" fill="" size="small" width="14" height="14" viewBox="0 0 128 128">
                                            <path d="M52 96a4 4 0 0 1-2.8-1.2l-24-24a4 4 0 0 1 5.6-5.6L52 86.3l45.2-45.1a4 4 0 1 1 5.6 5.6l-48 48A4 4 0 0 1 52 96z"></path>
                                        </svg>Ấm đun nước điện
                                    </div>

                                    <div>
                                        <svg class="bk-icon -iconset-checkmark" fill="" size="small" width="14" height="14" viewBox="0 0 128 128">
                                            <path d="M52 96a4 4 0 0 1-2.8-1.2l-24-24a4 4 0 0 1 5.6-5.6L52 86.3l45.2-45.1a4 4 0 1 1 5.6 5.6l-48 48A4 4 0 0 1 52 96z"></path>
                                        </svg>Ổ điện gần giường
                                    </div>
                                    <div>
                                        <svg class="bk-icon -iconset-checkmark" fill="" size="small" width="14" height="14" viewBox="0 0 128 128">
                                            <path d="M52 96a4 4 0 0 1-2.8-1.2l-24-24a4 4 0 0 1 5.6-5.6L52 86.3l45.2-45.1a4 4 0 1 1 5.6 5.6l-48 48A4 4 0 0 1 52 96z"></path>
                                        </svg>Sàn lát gạch/đá cẩm thạch
                                    </div>
                                    <div>
                                        <svg class="bk-icon -iconset-checkmark" fill="" size="small" width="14" height="14" viewBox="0 0 128 128">
                                            <path d="M52 96a4 4 0 0 1-2.8-1.2l-24-24a4 4 0 0 1 5.6-5.6L52 86.3l45.2-45.1a4 4 0 1 1 5.6 5.6l-48 48A4 4 0 0 1 52 96z"></path>
                                        </svg>Giá treo quần áo
                                    </div>

                                    <div>
                                        <svg class="bk-icon -iconset-checkmark" fill="" size="small" width="14" height="14" viewBox="0 0 128 128">
                                            <path d="M52 96a4 4 0 0 1-2.8-1.2l-24-24a4 4 0 0 1 5.6-5.6L52 86.3l45.2-45.1a4 4 0 1 1 5.6 5.6l-48 48A4 4 0 0 1 52 96z"></path>
                                        </svg>Điều hòa không khí
                                    </div>
                                </div>
                                <br>
                                <div style="font-family: 'Times New Roman';font-size: 20px"><b>Hút thuốc:</b>
                                    ​Không hút thuốc
                                </div>
                                <br>
                                <div style="font-family: 'Times New Roman';font-size: 20px"><b>Chỗ đậu xe:</b>
                                </div>
                                <br>
                                <div style="font-size: 20px">
                                    <svg class="bk-icon -iconset-parking_sign" fill="#008009" size="medium" width="20" height="16" viewBox="0 0 128 128">
                                        <path d="M70.8 44H58v16h12.8a8 8 0 0 0 0-16z"></path>
                                        <path d="M108 8H20A12 12 0 0 0 8 20v88a12 12 0 0 0 12 12h88a12 12 0 0 0 12-12V20a12 12 0 0 0-12-12zM70 76H58v24H42V28h28a24 24 0 0 1 0 48z"></path>
                                    </svg>
                                    ​Có chỗ đỗ xe bãi đỗ riêng miễn phí tại chỗ (không cần đặt chỗ trước).
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="col-md-1"></div>
              <div class="col-md-5" style="margin: 70px 15px 20px 30px ; border: solid 2px #0b3e6f; padding-bottom: 32px">
                        <table class="table borderless myTable-1">
                            <tr style="color: rgb(122,118,118); width: 50%">
                                <th>NHẬN PHÒNG</th>
                                <th>TRẢ PHÒNG</th>
                            </tr>
                            <tr>
                                <td>{{ \Carbon\Carbon::parse($FirstDate)->format('d/m/Y')}}</td>
                                <td>{{ \Carbon\Carbon::parse($SecDate)->format('d/m/Y')}}</td>
                            </tr>
                        </table>
                        <!--chua hover duoc -->
                        <table id="mytable" class="table table-hover" style="margin-top: -22px">
                            <tr id="mytable-th" style="color: rgb(122,118,118)">
                                <th style="border: none">TÊN PHÒNG</th>
                                <th style="border: none">KHÁCH</th>
                                <th style="border: none">GIÁ/Đêm (đ)</th>
                                <th style="border: none">TỔNG TIỀN (đ)</th>
                            </tr>
                            <tr id="room-row1" style="background-color: white">
                                <td> &nbsp;{{$room->RoomType}} </td>
                                <td>{{$room->Capacity}}</td>
                                <td>{{number_format($room->Price)}}</td>
                                <td class="row-total">{{number_format($TotalCost)}}</td>
                            </tr>
                        </table>
                        <table id="table-result" class="table borderless" style="margin-top: -15px;">
                            <tr>
                                <td id="table-result-1">Tổng số
                                    <span id="table-result-11" style="font-weight: bold">1</span> Phòng,
                                    <span id="table-result-12" style="font-weight: bold">{{$room->Capacity}}</span> Khách &
                                    <span id="table-result-13" style="font-weight: bold; text-decoration: underline">{{$StayDuration}}</span><u> Đêm</u>
                                </td>
                            </tr>
                        </table>
                        @if(count($errors)>0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $err)
                                    {{ $err }}<br>
                                @endforeach
                            </div>
                        @endif
                        <div>
                            <button id='datphong' class="btn btn-success">
                                ĐẶT PHÒNG
                            </button>
                        </div>
                        <div class="form-group" id='formthanhtoan' style="display: none" >
                            <form method="POST" action="/bookings/new/{{$room->id}}/{{$FirstDate}}/{{$SecDate}}/{{$ProtectedCost}}">
                                {{ csrf_field()}}
                                <div class="form-group row">
                                    <div class="col-xs-6">
                                        <label for="first">Họ Tên:</label>
                                        <input class="form-control pull-left" name="guestName" id="first" type="text" required="First Name" />
                                    </div>
                                    <div class="col-xs-6">
                                        <label for="first">Phone:</label>
                                        <input class="form-control pull-right" id="phone" name="phone" id="last" type="number" required="phone" />
                                    </div>
                                </div>
                                <hr />
                                <input type="submit" name="thanhtoan" class="btn btn-success" value="Thanh Toán Tại Khách Sạn">
                                <input type="submit" name="thanhtoan" class="btn btn-success" value="Thanh Toán Qua visa">
                            </form>
                        </div>
                    </div>
                </div>
    </div>

{{--                <div id="footer"></div>--}}
{{--                <div class="modal fade" id="theModal">--}}
{{--                    <div class="modal-dialog">--}}
{{--                        <div class="modal-content">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
    <script type="text/javascript" src="{{URL::asset('engine1/wowslider.js') }}"></script>
    <script type="text/javascript" src="{{URL::asset('engine1/script.js') }}"></script>
    <script src="/js/bootstrap-rating.js" type="text/javascript"></script>
    <script>
        $('.autoplay').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2500,
            arrows:false,
            infinite: true,
            speed: 1000,
            fade: true,
            cssEase: 'linear'

        });
    </script>
{{--    <style>#myCarousel .list-inline {--}}
{{--            white-space: nowrap;--}}
{{--            overflow-x: auto;--}}
{{--        }--}}

{{--        #myCarousel .carousel-indicators {--}}
{{--            position: static;--}}
{{--            left: initial;--}}
{{--            width: initial;--}}
{{--            margin-left: initial;--}}
{{--        }--}}

{{--        #myCarousel .carousel-indicators > li {--}}
{{--            width: initial;--}}
{{--            height: initial;--}}
{{--            text-indent: initial;--}}
{{--        }--}}

{{--        #myCarousel .carousel-indicators > li.active img {--}}
{{--            opacity: 0.7;--}}
{{--        }--}}

{{--        img.img-fluid {--}}
{{--            margin-top: 10px;--}}
{{--            width: 150px;--}}
{{--            height: 150px;--}}
{{--        }--}}

{{--        .panel-primary {--}}
{{--            margin-bottom: -3px;--}}
{{--            background-color: #2e2d2d;--}}
{{--             border-color:  #2e2d2d;--}}
{{--        }--}}
{{--    </style>--}}
@endsection


@section('scripts')
    <script>

        $("#datphong").click(function () {
            $('#roommate_but').prop('disabled', true);
            $("#formthanhtoan").css("display", "block");
            $("#datphong").css("display", "none");
        });
    </script>
    <!--JavaScript-->
{{--    <script src="{{URL::asset('/js/room-bookings.js')}}"></script>--}}
{{--    <script src="{{URL::asset('/Utilities/smoothscroll-for-websites-master/SmoothScroll.js')}}"></script>--}}
{{--    <script src="{{URL::asset('/Utilities/LiveChat.js')}}"></script>--}}
    <!--Form Feedback (position: fixed): https://webengage.com/ , phai dang ky', chua tach ra duoc file rieng do co' kem` id-->
    {{--        <script id="_webengage_script_tag" type="text/javascript">--}}
    {{--            var webengage;--}}
    {{--            !function (e, t, n) {--}}
    {{--                function o(e, t) {--}}
    {{--                    e[t[t.length - 1]] = function () {--}}
    {{--                        r.__queue.push([t.join("."), arguments])--}}
    {{--                    }--}}
    {{--                }--}}

    {{--                var i, s, r = e[n], g = " ", l = "init options track onReady".split(g),--}}
    {{--                    a = "feedback survey notification".split(g), c = "options render clear abort".split(g),--}}
    {{--                    p = "Open Close Submit Complete View Click".split(g),--}}
    {{--                    u = "identify login logout setAttribute".split(g);--}}
    {{--                if (!r || !r.__v) {--}}
    {{--                    for (e[n] = r = {__queue: [], __v: "5.0", user: {}}, i = 0; i < l.length; i++) o(r, [l[i]]);--}}
    {{--                    for (i = 0; i < a.length; i++) {--}}
    {{--                        for (r[a[i]] = {}, s = 0; s < c.length; s++) o(r[a[i]], [a[i], c[s]]);--}}
    {{--                        for (s = 0; s < p.length; s++) o(r[a[i]], [a[i], "on" + p[s]])--}}
    {{--                    }--}}
    {{--                    for (i = 0; i < u.length; i++) o(r.user, ["user", u[i]]);--}}
    {{--                    var f = t.createElement("script"), d = t.getElementById("_webengage_script_tag");--}}
    {{--                    f.type = "text/javascript", f.async = !0, f.src = ("https:" == t.location.protocol ? "//ssl.widgets.webengage.com" : "//cdn.widgets.webengage.com") + "/js/widget/webengage-min-v-5.0.js", d.parentNode.insertBefore(f, d)--}}
    {{--                }--}}
    {{--            }(window, document, "webengage");--}}
    {{--            webengage.init('~15ba209b4');--}}
    {{--            webengage.options('isDemoMode', true);--}}
    {{--        </script>--}}
@endsection


