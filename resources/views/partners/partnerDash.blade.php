@extends('layouts.app')

@section('content')
@unless ($UsersRole->role_id ==2 )

<!-- Displays the Partners Dashboard -->
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2" style="margin-top: 69px;">
            <div class="panel panel-default" style="border-top-color: #e74c3c;">
                <div class="panel-heading"> <b>Xin chào {{$UsersRole->RoleName}} - {{$Partner->CompanyName}} Bạn đã đăng nhập!</b>  </div>
                <div class="panel-body">
                    @if($Partner->Status == 1)
                    <div class="list-group">
                      <a href="/partners/{{$Partner->id}}/yourhotels" class="list-group-item">Khách sạn của bạn</a>
                      <a href="/partners/{{$Partner->id}}/newhotel" class="list-group-item">Thêm một khách sạn mới</a>
                    @if ($PartnerHotels > 0)
                      <a href="/partners/{{$Partner->id}}/graphs" class="list-group-item">Xem thống kê khách sạn</a>
                    @endif
                    </div>
                    @else
                        <div class="text-center alert alert-danger">Khách sạn của bạn đang bị khóa. Bạn cần liên hệ với
                            quản trị hệ thống để biết thông tin.
                        </div>
                    @endif
                </div>
                <div class="panel-footel text-center">
                   </div>
            </div>
        </div>
    </div>
</div>
@endsection

@else
  <h1> No Way.</h1>
  @endunless
