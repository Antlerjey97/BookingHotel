<style>
  .text {
    margin: 0px 0px 8px 1px
  }

  #star {
    padding-top: 16px;
  }

  .panel-body .text {
    font-size: 14px;
    color: #8f8f8f;
    font-weight: 500;
    line-height: 14px;
    text-transform: capitalize;
  }

</style>
@extends('layouts.app') 
@section('content')
<link rel="stylesheet" type="text/css" href="{{URL::asset('/engine1/style.css') }}" />
<script type="text/javascript" src="{{URL::asset('/engine1/jquery.js') }}"></script>
<div style="margin:auto">
  <div class="row">
    <div class="col-md-6 " style="margin-left: 3%">
      <div id="wowslider-container1" style="margin: 0;">
        <div style="position: absolute; z-index: 1000; color: white; text-shadow: 1px 0px black; margin-left: 50px;bottom: 45px">
          <span style="font-weight: bolder; font-size: 30px" class="name-of-hotel">{{ $hotel->Name }}</span><br/>
          <div style="font-size: 15px">
            <span class="address-of-hotel">
                      {{ $hotel->Country}}
            </span>
          </div>
        </div>
        <div class="ws_images" style="margin-top: 70px">
          <ul>
            @foreach ($hotel->photos as $Photo)
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
          <h3 class="panel-title">Chi tiết khách sạn:</h3>
        </div>
        <div class="panel panel-body">
          <dl class="row" style="font-size: 15px;">
            <div class="title" style="margin-left: 10px;font-family: 'Times New Roman';font-size: 20px"><b>Mô tả khách
                sạn :</b> {{$hotel->description}}</div>
            <br>
            <dt class="col-sm-6" style="display: inline-block; ">Đánh giá người dùng đặt phòng:</dt>
            <dd class="col-sm-6">
              <img src="{{$starPath}}" style="margin-bottom: 10px"/>
              <b> {{$Rating}} %</b>
            </dd>
            <dt class="col-sm-5">Địa chỉ:</dt>
            <dd class="col sm-7">
              <b>{{ $hotel->Address}}</b>
            </dd>
            <dt class="col-sm-4">Các dịch vụ Tiện ích:</dt>
            <dd class="col sm-8" style="display: block; padding-left: 100px; ">
              @foreach($hotel->facilitys as $value)
                {{--                <span style="border: solid 1px #CC99CC;">{{ $value->name}}</span>--}}
                @if($value->name=='Điều hòa')
                  <div class="col-sm-2 ">
                    <p>Điều hòa  </p>
                    <!--do co' class="img-responsive" nen ko the? canh vao` center-->
                    <img class="img-responsive" src="../img/homepage/tiennghi-AC_Rooms.png" width="30px"/>
                  </div>

                @elseif($value->name=='Wifi')
                  <div class="col-sm-2 ">
                    <p> Wi-Fi Free</p>
                    <img class="img-responsive" src="../img/homepage/tiennghi-Free_Wi-Fi.png" width="22px"/>
                  </div>

                @elseif($value->name=='Bữa Sáng Miễn Phí')
                  <div class="col-sm-2 ">
                    <p>Bữa sáng </p>
                    <img class="img-responsive" src="../img/homepage/tiennghi-Complimentary_Breakfast.png"
                         width="22px"/>
                  </div>

                @elseif($value->name=='Truyền hình cáp')
                  <div class="col-sm-2 col-md-2">
                    <p>Truyền hình cáp</p>
                    <img class="img-responsive" src="../img/homepage/tiennghi-Cable_TV.png" width="22px"/>
                  </div>

                @endif
              @endforeach
            </dd>
            <dt class="col-sm-5">Số điện thoại liên Hệ:</dt>
            <dd class="col-sm-7"><b>{{ $hotel->TelephoneNumber}}</b></dd>
            
          </dl>
        </div>
      </div>
    </div>
    <div class="col-md-5" style="margin-top: 69px">
      @foreach ($Rooms as $Room)
      @if ($Room->spaceleft > 0)
      <div class="panel panel-default" style="border-top-color: #e74c3c; margin-bottom: 8px;">
        <div class="panel-body text">
          <div>
            <div style="float: left;height: 112px;width: 112px; display: block">
              <img src="{{$Room->photos[0]->path }}" style="display: inline-block;
                vertical-align: middle;
                height: 120px;
                width: 98%;"></div>
            <div style="float:left   ; width: 56%;">
              <p class="text"><b>{{$Room->RoomType}}</b></p>
              <p class="text"><img src="{{URL::asset('/images/succhua.svg') }}" alt="" style="display: inline-block;
                vertical-align: middle;
                height: 14px;
                width: auto;"> {{$Room->Capacity}} Khách</p>
              <p class="text"><svg fill="currentColor" stroke="none" style="display: inline-block;vertical-align: middle;height: 14px;width: auto;"
                  class="_1ztFV" height="24" stroke-linecap="round" viewBox="0 0 24 24" width="24"><path d="M22 19a.999.999 0 0 1 1 1c0 .552-.44 1-1.002 1H2.002A.999.999 0 0 1 1 20c0-.552.44-1 1.002-1H20v-2.5c0-1.379-1.118-2.5-2.492-2.5H6.492c-.812 0-1.535.393-1.99 1h13.497c.553 0 1.001.444 1.001 1 0 .552-.445 1-1 1H4a1 1 0 1 1-2 0v-.49c0-1.564.794-2.943 2-3.752V3.995C4 3.445 4.444 3 5 3c.552 0 1 .456 1 .995V5c.836-.628 1.876-1 3.004-1h6.002c1.123 0 2.16.372 2.994.999V3.995c0-.55.444-.995 1-.995.552 0 1 .456 1 .995v8.761a4.5 4.5 0 0 1 2 3.744V19zM6 9.267c.292-.17.63-.267.99-.267h4.02c.361 0 .7.096.992.265A1.97 1.97 0 0 1 12.991 9h4.018c.361 0 .7.096.991.264V9a3 3 0 0 0-2.994-3H9.004A3 3 0 0 0 6 9v.267zM16.99 11s-3.981 0-3.98-.001V12s3.981 0 3.98.001V11zM11 11l-4-.001V12l4 .001V11z"></path></svg>               
                   {{$Room->BedOption}}</p>
              <p class="text">{{$Room->View}}.</p>
              <p class="text">Giá : {{number_format($Room->Price)}} vnd</p>
            </div>
            <div style="padding-top: 34px;float: left;width: 20%;height: 121px;">
              <a href="/book/{{$hotel->id}}/{{$Room->id}}" class="btn" style="float: right;background-color: #f96d01;float: right;
                color: white;
                font-family: inherit;">Đặt ngay</a>
              <p style="padding-top: 45px;color: #f34646;font-size: 9px;font-weight: 700;text-align: center;">{{$Room->spaceleft}} phòng còn trống</p>
            </div>
          </div>
        </div>
      </div>
      @endif 
      @endforeach
    </div>
  </div>
  <hr>
  <div style="margin-left: 3%">
    <h4>Nhận xét:</h4>
    @if(count($hotel->reviews)>0)
    <table class="table">
      <thead>
        <tr>
          <th>Người dùng</th>
          <th style="width: 40%">Bình luận</th>
          <th style="width: 20%">Thời gian Bình luận</th>
          <th style="width: 15%">Đánh giá </th>
          <th style="width: 15%;text-align: center"> Chỉnh sửa</th>
        </tr>
      </thead>
      <tbody>
      {{--      {{dd($hotel->partner->user_id)}}--}}
        @foreach ($hotel->reviews as $Review)
        <tr>
          <td>
            @if($Review->user_id==$hotel->partner->user_id)
              <span style="color: red"><b>Quản lý khách sạn</b></span>
            @else
              <span class=""><b>{{@$Review->user->name}}</b></span></td>
          @endif
          <td>{{$Review->comment}}
          </td>
          <td>{{$Review->created_at}}</td>
          <td>
            <?php if ($Review->rating >= 80) $starpa='/images/5star.png' ?>
            <?php if ($Review->rating <80 && $Review->rating >= 60  ) $starpa='/images/4star.png' ?>
            <?php if ($Review->rating <60 && $Review->rating >= 40  ) $starpa='/images/3star.png' ?>
            <?php if ($Review->rating <40 && $Review->rating >= 20  ) $starpa='/images/2star.png' ?>
            <?php if ($Review->rating <20  ) $starpa='/images/2star.png' ?>
              <img src="{{$starpa}}" alt="">
          </td>
          <td class=" text-center"> @if ($Review->user_id == Auth::id())
              <a style="font-size: 15px" class="btn btn-primary " href="/reviews/{{$Review->id}}/edit">Chỉnh
                sửa</a>
              <a style="font-size: 15px" class="btn btn-danger " onclick="alert('Bạn có muốn xóa đánh giá không ?')"
                 href="/reviews/{{$Review->id}}/destroyreview">Xóa</a>
            @elseif($hotel->partner->user_id==Auth::user()->id)
              <a style="font-size: 15px" onclick="alert('Bạn có muốn xóa đánh giá không ?')" class="btn btn-danger"
                 href="/reviews/{{$Review->id}}/destroyreview">Xóa</a>
            @endif</td>
        </tr>
        @endforeach
      </tbody>
    </table>
    @else
      <div class="alert alert-info" style="text-align: center">Chưa có nhận xét </div>
      @endif
    <hr> @if ($RecentBooking == true||$hotel->partner->user_id==Auth::user()->id)
    <h4>Thêm nhận xét</h4>
    <form method="POST" action="/hotels/{{$hotel->id}}/reviews">
      {{ csrf_field()}}
      <div class="form-group">
        <textarea name="comment" class="form-control">{{ old('comment')}}</textarea>
        <label>Đánh giá sao:</label><input type="hidden" name="rating" class="rating" data-stop="100" data-step="20" />
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary">Thêm nhận xét</button>
      </div>
    </form>
    @endif @if (count($errors))
    <ul>
      @foreach ($errors->all() as $error)
      <div class="list-group">
        <li class="list-group-item list-group-item-action list-group-item-danger">
          {{$error}}
        </li>
        @endforeach
      </div>
    </ul>
    @endif
  </div>
</div>
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
@endsection