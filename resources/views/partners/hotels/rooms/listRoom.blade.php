@extends('layouts.app')
@section('content')
    <div class="col-md-8 col-md-offset-2" style="margin-top: 69px;">
        <div class="panel panel-default" style="border-top-color: #e74c3c;">
            <div class="panel-heading" style="height: 49px"><b><h4>Danh sách Phòng</h4></b> <a class="btn btn-primary pull-right" style="margin-top: -40px" href="/yourhotels/{{$hotel->id}}/dashboard">Trở về</a></div>
            <div class="panel-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Loại Phòng</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($hotel->rooms as $room)
                        <tr>
                            <td><a class="" href="#">{{$room->RoomType}}:</a></td>
                            <td></td>
                            <td><a class="btn btn-default pull-right" href="/rooms/{{$room->id}}/edit">Chỉnh sửa
                                    phòng</a></td>
                            <td><a class="btn btn-danger pull-right" href="/rooms/{{$room->id}}/discard">Xóa phòng</a>
                            </td>

                        </tr>

                    @endforeach
                    </tbody>
                </table>
                <hr>
                <!-- Adding a new Room -->
            </div>
        </div>
    </div>
@endsection