@extends('layouts.app')
@section('content')
<!-- Shows the hotel dashboard allowing the  partner to select what they wish to do.-->
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2" style="margin-top: 69px;">
        <div class="panel panel-default" style="border-top-color: #e74c3c;">
            <div class="panel-heading" style="height: 49px"><b><h4>Trang tổng quan khách sạn</h4></b> <a class="btn btn-primary pull-right" style="margin-top: -40px" href="/yourhotels/{{$hotel->id}}/dashboard">Trở về</a></div>
            <div class="panel-body">
                  <div class="list-group">
                    <a href="/viewreservations/{{$hotel->id}}" class="list-group-item">Xem đặt chỗ</a>
                    <a href="/yourhotels/edit/{{$hotel->id}}" class="list-group-item">Chỉnh sửa khách sạn</a>
                      <a href="{{route('list.room',[$hotel->id])}}" class="list-group-item">Danh sách các phòng khách sạn</a>
                      <a href="{{route('add.room',[$hotel->id])}}" class="list-group-item">Thêm Phòng khách sạn</a>
                  </div>
                </div>
              <hr>
            </div>
          </div>
   </div>
</div>
@endsection
