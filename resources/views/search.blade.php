@extends('layouts.app')
@section('css')
<style>
    #language {
        margin-top: 18px;
    }
    #star {
        height: 60px;
    }
</style>
@endsection
<div class="container">
@section('content')
    <div id="booking" style="margin-top: 69px">
        <div id="booking_slogan">
            Kỳ nghỉ thú vị tại thành phố Ninh Bình
            <br>
            Với các địa điểm du lịch nổi tiếng.
        </div>
        <div id="search_form">
            <div style="background-color: black; opacity: 0.3;width: 100%;  height: 328px; position: absolute; border-radius: 5px"></div>
            <form method="POST" action="/search" style="position: absolute; padding: 28px" enctype="multipart/form-data" name="search"
                onsubmit="return validateForm()">
                {{ csrf_field()}}
                <div id="search-locations">
                    <img src="../img/homepage/Delete-25.png" width="16px" style="position: absolute; margin-left: 405px; margin-top: 14px; display: none"/>
                    <input class="form-control biginput" type="search" name="searchterm" id="checkin" placeholder="Nhập tên khách sạn,địa chỉ">
                </div>
                <div style="height: 160px">
                    <table class="table borderless">
                        <tr style="color: white">
                            <label class="text-muted" for="checkin" style="color:white;">Vui lòng chọn ngày nhận phòng và ngày trả phòng :</label>
                            <input class="date form-control" type="text" name="daterange" id="checkin" placeholder="Chọn ngày.." required>
                        </tr>
                        <tr>
                            <label class="text-muted" for="travelers" style="color:white;">Số người :</label>
                            <select name="numtravelers" class="form-control">
                                <option value=""></option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                            </select>
                        </tr>
                    </table>
                </div>
                <div style="margin-top: auto; text-align: center">
                    <button type="submit" class="btn mybtn-style1" id="booking_form_search"> TÌM KIẾM </button>
                </div>
{{--                <div style="color: white; text-align: center; width: 100%; height: 35px; line-height: 35px">Đặt bây giờ. Thanh toán sau tại khách sạn.</div>--}}
            </form>
        </div>
    </div>
{{--    <img src="../img/homepage/Center_1440x860.jpg" width="100%" height="92%" />--}}
        <img src="../img/homepage/center1.jpg" width="100%" height="92%" />
</div>
</div>
<div id="our_promise">
    <div class="container-fluid">
        <div id="our_promise_title"> CHÚNG TÔI ĐẢM BẢO:</div>
        <!-- khi dung flexbox thi class="img-responsive" ko tac dung -->
        <div class="row" style="width: 80%; margin: 0 auto; text-align: center;  color: rgb(70,68,68)">
            <!--<div class="col-xs-2 col-sm-2 col-md-2">-->
            <div class="col-sm-2 col-md-2">
                <p>Điều hòa</p>
                <!--do co' class="img-responsive" nen ko the? canh vao` center-->
                <img class="img-responsive" src="../img/homepage/tiennghi-AC_Rooms.png" />
            </div>
            <div class="col-sm-2 col-md-2">
                <p>Truyền hình cáp</p>
                <img class="img-responsive" src="../img/homepage/tiennghi-Cable_TV.png" />
            </div>
            <div class="col-sm-2 col-md-2">
                <p>Ra trải giường sạch sẽ</p>
                <img class="img-responsive" src="../img/homepage/tiennghi-Spotless_Linen.png" />
            </div>
            <div class="col-sm-2 col-md-2">
                <p>Bữa sáng miễn phí</p>
                <img class="img-responsive" src="../img/homepage/tiennghi-Complimentary_Breakfast.png" />
            </div>
            <div class="col-sm-2 col-md-2">
                <p>Miễn phí Wi-Fi</p>
                <img class="img-responsive" src="../img/homepage/tiennghi-Free_Wi-Fi.png" />
            </div>
            <div class="col-sm-2 col-md-2">
                <p>Nhà vệ sinh đạt chuẩn</p>
                <img class="img-responsive" src="../img/homepage/tiennghi-Hygienic_Washrooms.png" />
            </div>
        </div>
    </div>
</div>

<div id="promotion">
    <div class="container-fluid">
        </br>
        <div id="promotion_title" style="margin-bottom: 50px "> Khách Sạn Các Địa điểm du lịch tại Ninh Bình
            <div class="redline" style="width: 50px; margin: 0 auto;"></div>
        </div>


        <div class="container" style="margin-top: 10px">
            <div class="grid">
            {{--                <figure class="effect-chico">--}}
            {{--                    <img src="../img/homepage/trangan1.jpg" width="550px" alt="img15" />--}}
            {{--                    <figcaption>--}}
            {{--                        <strong>Hotel booking <span class="txt-name-location">Ninh Bình</span></strong>--}}
            {{--                        <h3 style="margin-top: 20%">--}}
            {{--                          <span class="txt-name-location" name="County" value="Hải Châu">Địa điểm Xã Ninh Xuân</span>--}}
            {{--                        </h3>--}}
            {{--                        <a href="hotel/location=Ninh+Xuân"></a>--}}
            {{--                        <p>Lập kế hoạch nghỉ ngơi những điểm yêu thích tại Ninh Bình</p>--}}
            {{--                        <!--<a href="#">View more</a>-->--}}
            {{--                    </figcaption>--}}
            {{--                </figure>--}}
                <!--mac dinh the figure dag cai` float: left-->
                <figure class="effect-chico">
                    <img src="../img/homepage/promotion_3.jpg" width="550px" height="200px" alt="img04"/>
                    <figcaption>
                        <h3>
                            <span class="txt-name-location" name="County" value="Liên Chiểu">Thành phố Ninh Bình</span>
                        </h3>
                        <a href="hotel/location=Ninh+Bình"></a>
                        <p>Lập kế hoạch nghỉ ngơi những điểm yêu thích tại Ninh Bình</p>
                        <!--<a href="#">View more</a>-->
                    </figcaption>
                </figure>
                <figure class="effect-chico">
                    <img src="../img/homepage/trangan2.jpg" width="550px" height="200px" alt="img04"/>
                    <figcaption>
                        <h3>
                            <span class="txt-name-location" name="County"
                                  value="Ninh xuân"> Ninh Xuân</span>
                        </h3>
                        <a href="hotel/location=Ninh+Xuân"></a>
                        <p>Địa điểm này gồm có khu du lịch sinh thái Tràng an và Hang múa.</p>
                        <!--<a href="#">View more</a>-->
                    </figcaption>
                </figure>

                <figure class="effect-chico">
                    <img src="../img/homepage/trangan1.jpg" width="550px" height="200px" alt="img04"/>
                    <figcaption>
                        <h3>
                            <span class="txt-name-location" name="County" value="Sơn Trà"> Ninh Hải</span>
                        </h3>
                        <a href="hotel/location=Ninh+Hải"></a>
                        <p>Địa điểm này gồm  khu du lịch Tam cốc bích động, Chùa bích động và Khu du lịch sinh thái vườn chim thung Nham.</p>
                        <!--<a href="#">View more</a>-->
                    </figcaption>
                </figure>
                <figure class="effect-chico">
                    <img src="../img/homepage/codohoalu.jpg" width="550px" height="200px" alt="img04" />
                    <figcaption>
                        <h3>
                            <span class="txt-name-location" name="County" value="Liên Chiểu"> Trường yên</span>
                        </h3>
                        <a href="hotel/location=Trường+Yên"></a>
                          <p>Địa điểm này gồm  khu du lịch Cố đô Hoa Lư.</p>

                    </figcaption>
                </figure>

                <figure class="effect-chico">
                    <img src="../img/homepage/chuabaidinh.jpg" width="550px" height="200px" alt="img04"/>
                    <figcaption>
                        <h3>
                            <span class="txt-name-location" name="County" value="Liên Chiểu">Gia Sinh</span>
                        </h3>
                        <a href="hotel/location=Gia+Sinh"></a>
                        <p>Địa điểm này gồm  khu du lịch Chùa bái Đính và Đầm Vân Long.</p>
                        <!--<a href="#">View more</a>-->
                    </figcaption>
                </figure>
            </div>
        </div>
    </div>
</div>
            <!-- make blockquote http://jsfiddle.net/pz6kx0bw/ -->
<div class="row">
    <div class="container-fluid">
        <div class="panel panel-default" style="border-top-color: #e74c3c; margin-top: 20px">
            <div class="panel-heading" style="font-size: 20px;text-align: center"><b>Các khách sạn mới đăng ký</b></div>
            <div class="panel-body">
                <!-- Displays Each Hotel as a "Card" and a button to visit the hotels page. -->
                @if(count($Hotels)>0)
                @foreach ($Hotels as $Hotel)
                        <div class="col-sm-3">
                            <div class="card card-body flex-fill" style="height: 495px !important;">
                                <div>
                                    <img class="card-img-top" style="height: 250px; width: 100%; padding: 7px"
                                         src="{{$Hotel->thumbnail->path}}" alt="Card image">
                                </div>
                                <div class="card-block">
                                    <h4 class="card-Title">{{ $Hotel->Name}}</h4>
                                    <p class="card-text">{{$Hotel->description}}</p>
                                </div>
                                @if (Auth::check())
                                    <a href="/hotels/{{$Hotel->id}}" class="btn btn-primary"
                                       style="float: right;margin: 0px 10px 5px 10px;">Xem</a>
                                @else
                                    <a href="/login" class="btn btn-primary"
                                       style="float: right;margin: 0px 10px 5px 10px;">Xem</a>
                                @endif
                            </div>
                        </div>
                @endforeach
                @else
                    <div class="text-center alert alert-danger">Không có khách sạn mới đăng ký nào</div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
</div>
@section('scripts')
            <script>
                $(document).ready(function ()
                { $(".card-text").each(function(i){
                    var len=$(this).text().trim().length;
                    if(len>100)
                    {
                        $(this).text($(this).text().substr(0,100)+'...');
                    }
                });

                });</script>
<script src="https://unpkg.com/flatpickr"></script>
<script>
    flatpickr(".date", {
	minDate: "today",
  mode:"range",
});
function validateForm() {
  var setdate = document.forms["search"]["daterange"].value;
  if(setdate == ""){
    Command: toastr["warning"]
           ("Ngày phải được điền")
    toastr.options = {
          "positionClass" : "toast-top-center",
         }
    return false;
  }
}
</script>
@endsection