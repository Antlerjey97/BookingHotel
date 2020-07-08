@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2" style="margin-top: 69px">
            @if (Session::has('success'))
                <div style="">
                    <div class="alert alert-success" role="alert">
                        <strong>Thông báo:</strong> {{ Session::get('success') }} và đang chờ phê duyệt
                    </div>
                </div>
            @endif
        </div>
        <div class="col-md-10 col-md-offset-1" style="margin-top-left: 9px">
            <div class="panel panel-default" style="border-top-color: #e74c3c;">
                <div class="panel-heading" style="text-align: center;font-size: 20px"><b>Thông tin Cá nhân khách hàng</b></div>
                <div class="panel-body" style="margin-left: 50px">
                    <p><label> Tên : </label> {{$User->name}}</p>
                    <p><label> Email : </label> {{$User->email}}</p>
                    <p><label> Password :</label> *************</p>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modelId">Sửa tài khoản
                    </button>
                    <a class="btn btn-primary pull-right" href="/home">Trở về</a>
                    <!-- Button trigger modal -->
                    <!-- Modal -->
                    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
                         aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="modelTitleId"></h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form class="form-horizontal" method="POST" action="{{route('admin.edit', $User->id)}}">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <div class="form-group" style="font-size: 18px">
                                            <label for="name" class="col-md-4 control-label">Tên</label>
                                            <div class="col-md-6">
                                                <input id="name" type="text" class="form-control" name="name"
                                                       value="{{ old('name') ?? $User->name }}">
                                                @if($errors->has('name'))
                                                    <span class="invalid-feedback"
                                                          role="alert"><strong>{{ $errors->first('name') }}</strong></span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group" style="font-size: 18px">
                                            <label for="email" class="col-md-4 control-label">E-Mail </label>
                                            <div class="col-md-6">
                                                <input id="email" type="email" class="form-control" name="email"
                                                       value="{{ old('email') ?? $User->email }}"/>
                                                @if($errors->has('email'))
                                                    <span class="invalid-feedback"
                                                          role="alert"><strong>{{ $errors->first('email') }}</strong></span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group" style="font-size: 18px">
                                            <label for="password" class="col-md-4 control-label">Mật khẩu</label>
                                            <div class="col-md-6">
                                                <input id="password" type="password" class="form-control" name="password"
                                                       value="{{ old('password') ?? $User->password }}"/>
                                                @if($errors->has('password'))
                                                    <span class="invalid-feedback"
                                                          role="alert"><strong>{{ $errors->first('password') }}</strong></span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-md-offset-4">
                                            <button type="submit" class="btn btn-primary">
                                                Đăng ký
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
        <div class="col-md-10 col-md-offset-1" style="margin-top: 9px">
            <div class="panel panel-default" style="border-top-color: #e74c3c;">
                <div class="panel-heading" style="text-align: center;font-size: 20px"><b>Thông tin đối tác đang chờ xác nhận</b></div>
                <div class="panel-body" style="margin-left: 50px">
                    <img style="margin-left: 80px;padding-bottom: 10px" src="{{URL::asset('upload/'.$proposal->ImagePath)}}" width="80%" height="260px" alt="" srcset="">
                    <h3 style="text-align: center"> {{$proposal->CompanyName}}</h3>
                    <p><label> Email khách sạn : </label> {{$proposal->CompanyEmail}}</p>
                    <p><label> Địa chỉ : </label>{{$proposal->HQAddress}}</p>
                    <p><label> Mô tả : </label>{{$proposal->Vision}}</p>
                    <p><label> Tên : </label>{{$proposal->fname}} {{$proposal->lname}}</p>
                    <p><label> Số điện thoại :</label> 0{{$proposal->phone_number}} @if ($proposal->verified) (Đã xác thực) @else
                    (Chưa xác thực) @endif
                    </p>
                    <p><label> Thẻ ngân hàng :</label> {{$proposal->card}}</p>
                    <p><label> Chức vụ trong công ty :</label> {{$proposal->cv}}</p>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#exampleModal').on('show.bs.modal', event => {
            var button = $(event.relatedTarget);
            var modal = $(this);
            // Use above variables to manipulate the DOM
        });
    </script>
@endsection
