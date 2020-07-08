@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2" style="margin-top: 69px;">
        <div class="panel panel-default" style="border-top-color: #e74c3c;">

            <div class="panel-heading"><h4><b>Chỉnh sửa phòng</b></h4></div>
            <div class="panel-body">
  <!--Form for a Partner to edit a room in their hotel -->
  <form method="POST" action="/rooms/{{$room->id}}/edit">
    {{ csrf_field()}}
    {{ method_field('PATCH')}}

    <div class="form-group">
      <label for="roomtypebox" class="col-2 col-form-label">Loại phòng :</label>
      <div class="col-10">

        <input class="form-control" name="RoomType" type="text" value="{{$room->RoomType}}"  id="roomtypebox">
        @if($errors->has('RoomType'))
          <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('RoomType') }}</strong></span>
        @endif
      </div>
    </div>

    <div class="form-group">
      <label for="capacitybox" class="col-2 col-form-label">Sức chứa:</label>
      <div class="col-10">
        <input class="form-control" name="Capacity" type="text" value="{{$room->Capacity}}"  id="Addressbox">
        @if($errors->has('Capacity'))
          <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('Capacity') }}</strong></span>
        @endif
      </div>
    </div>

    <div class="form-group">
      <label for="bedsbox" class="col-2 col-form-label">Loại giường:</label>
      <div class="col-10">
        <input class="form-control" name="BedOption" type="text" value="{{$room->BedOption}}" id="bedsbox">
        @if($errors->has('BedOption'))
          <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('BedOption') }}</strong></span>
        @endif
      </div>
    </div>

    <div class="form-group">
      <label for="pricebox" class="col-2 col-form-label">Giá: (vnd)</label>
      <div class="col-10">
        <input class="form-control" name="Price" type="text" value="{{$room->Price}}" id="pricebox">
        @if($errors->has('Price'))
          <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('Price') }}</strong></span>
        @endif
      </div>
    </div>

    <div class="form-group">
      <label for="viewbox" class="col-2 col-form-label">View:</label>
      <div class="col-10">
        <input class="form-control" name="View" type="text" value="{{$room->View}}" id="viewbox">
        @if($errors->has('View'))
          <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('View') }}</strong></span>
        @endif
      </div>
    </div>

    <div class="form-group">
      <label for="totalroombox" class="col-2 col-form-label">Số phòng:</label>
      <div class="col-10">
        <input class="form-control" name="TotalRooms" type="text" value="{{$room->TotalRooms}}" id="totalroombox">
        @if($errors->has('TotalRooms'))
          <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('TotalRooms') }}</strong></span>
        @endif
      </div>
    </div>
    <a class="btn btn-primary pull-right" href="{{route('list.room',[$room->hotel_id])}}">Trở về</a>
    <button type="submit" class="btn btn-primary">Sửa</button>

  </form>
</div>
</div>
</div>
  <div class="col-md-8 col-md-offset-2" style="margin-top: 69px;">
    <div class="panel panel-default" style="border-top-color: #e74c3c;">
      <div class="panel-body">
        <h1>Hình ảnh:</h1>
        <table class="table">
          <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col"></th>
          </tr>
          </thead>
          <tbody>
          @foreach ($room->photos as $photo)
            <tr>
              <td><img class="img-thumbnail" style="height: 120px;width: 120px;" src="{{$photo->path}}"/><a class="btn btn btn-danger pull-right text-center" href="/room/{{$room->id}}/{{$photo->id}}/destroy">Xóa</a> </td>
            </tr>
          @endforeach
          </tbody>
        </table>
        <hr />
        <a href="/room/{{$room->id}}/photos" class="btn btn-primary" style="margin-bottom: 20px">Thêm hình ảnh</a><br>
      </div>
    </div>
  </div>
@endsection
