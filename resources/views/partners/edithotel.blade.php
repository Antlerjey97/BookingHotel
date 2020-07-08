@extends('layouts.app')
@section('content')
    <div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2" style="margin-top: 69px;">
                <div class="panel panel-default" style="border-top-color: #e74c3c;">
                    <div class="panel-heading" style="height: 49px"><b><h4>Chỉnh sửa khách sạn</h4></b> <a class="btn btn-primary pull-right" style="margin-top: -40px" href="/yourhotels/{{$hotel->id}}/dashboard">Trở về</a></div>
                    <div class="panel-body">
                        <form method="POST" action="/yourhotels/edit/{{$hotel->id}}" enctype="multipart/form-data">
                            {{ csrf_field()}}
                            {{ method_field('PATCH')}}

                            <div class="form-group">
                                <label for="namebox" class="col-2 col-formabel">Tên khách sạn:</label>
                                <div class="col-10">
                                    <input class="form-control" name="Name" type="text" value="{{$hotel->Name}}" id="namebox">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="Addressbox" class="col-2 col-form-label">Địa chỉ:</label>
                                <div class="col-10">
                                    <input class="form-control" name="Address" type="text" value="{{$hotel->Address}}" id="Addressbox">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="Countybox" class="col-2 col-form-label">Quận :</label>
                                <div class="col-8">
                                    {{Form::select('County',$array,$quancam,array('class' => 'form-control'))}}
                                </div>
                            </div>
                            <div class="row" style="margin-left:5px;">
                                <div class="form-group">
                                    <label for="Facilitybox" class="col-2 col-form-label">Tiện ích hiện có:</label>
                                    <div class="row">
                                        @foreach ( $fas as $key => $fa )
                                            <span style="padding-left: 15px;"><input name="namet[]" type="checkbox" value="{{$fa->id}}" checked=""  readonly=""> {{$fa->name }}</span>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-left:5px;">
                                <div class="form-group">
                                    <label for="Facilitybox" class="col-2 col-form-label">Tiện ích :</label>
                                    <div class="row">
                                        @foreach ( $facilities as $key => $fa )
                                            <span  style="padding-left: 15px;"><input  name="names[]" type="checkbox" value="{{$fa->id }}"> {{$fa->name }}</span>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="Telbox" class="col-2 col-form-label">Số điện thoại:</label>
                                <div class="col-10">
                                    <input class="form-control" name="TelephoneNumber" type="text" value="{{$hotel->TelephoneNumber}}" id="Telbox">
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="hidden" value="imag.jpg" name="ImagePath" />
                                <label for="imagebox" class="col-2 col-form-label">Hình nhỏ:</label>
                                <p>Hình thu nhỏ hiện tại: {{$hotel->thumbnail->path}}</p>
                                <div class="col-10">
                                    <input  name="displaypic" type="file" value="{{$hotel->thumbnail->path}}" id="imagebox">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="Descbox" class="col-2 col-form-label">Mô tả:</label>
                                <div class="col-10">
                                    <input class="form-control" name="description" type="text" value="{{$hotel->description}}" id="Descbox">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Sửa khách sạn</button>
                            <a class="btn btn btn-danger pull-right" href="/yourhotels/destroy/{{$hotel->id}}">Xóa</a>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Change the rooms provided at the hotel -->
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
                            @foreach ($hotel->photos as $photo)
                                <tr>
                                    <td><img class="img-thumbnail" style="height: 120px;width: 120px;" src="{{$photo->path}}"/><a class="btn btn btn-danger pull-right text-center" href="/{{$hotel->id}}/{{$photo->id}}/destroy">Xóa</a> </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <hr />
                        <a href="/{{$hotel->id}}/photos" class="btn btn-primary">Thêm hình ảnh</a>
                    </div>
                </div>
            </div>
@endsection
