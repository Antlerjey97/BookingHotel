
@extends('layouts.app')
@section('content')

    <div class="row">

        <div class="col-md-8 col-md-offset-2" style="margin-top: 69px;">
            <div class="panel panel-default" style="border-top-color: #e74c3c;">
                <div class="panel-heading" style="height: 49px"><b><h4>Thêm Phòng khách sạn</h4></b> <a class="btn btn-primary pull-right" style="margin-top: -40px" href="/yourhotels/{{$hotel->id}}/dashboard">Trở về</a></div>

                <div class="panel-body">
                    <!-- A form to collect all the Hotel Details when the Partner sets up a new Hotel.-->
                    <form method="POST" action="/yourhotels/{{$hotel->id}}/rooms">
                        {{ csrf_field()}}
                        <div class="form-group">
                            <label for="roomtypebox" class="col-2 col-form-label">Loại phòng:</label>
                            <div class="col-10">
                                <input class="form-control" name="RoomType" type="text" id="roomtypebox">
                                @if($errors->has('RoomType'))
                                    <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('RoomType') }}</strong></span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="capacitybox" class="col-2 col-form-label">Sức chứa:</label>
                            <div class="col-10">
                                <input class="form-control" name="Capacity" type="text" id="Addressbox">
                                @if($errors->has('Capacity'))
                                    <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('Capacity') }}</strong></span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="bedsbox" class="col-2 col-form-label">Loại giường:</label>
                            <div class="col-10">
                                <input class="form-control" name="BedOption" type="text" id="bedsbox">
                                @if($errors->has('BedOption'))
                                    <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('BedOption') }}</strong></span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="pricebox" class="col-2 col-form-label">Giá: (vnd)</label>
                            <div class="col-10">
                                <input class="form-control" name="Price" type="text" id="pricebox">
                                @if($errors->has('Price'))
                                    <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('Price') }}</strong></span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="viewbox" class="col-2 col-form-label">View:</label>
                            <div class="col-10">
                                <input class="form-control" name="View" type="text" id="viewbox">
                                @if($errors->has('View'))
                                    <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('View') }}</strong></span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="totalroombox" class="col-2 col-form-label">Số phòng:</label>
                            <div class="col-10">
                                <input class="form-control" name="TotalRooms" type="text" id="totalroombox">
                                @if($errors->has('TotalRooms'))
                                    <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('TotalRooms') }}</strong></span>
                                @endif
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Thêm phòng</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

