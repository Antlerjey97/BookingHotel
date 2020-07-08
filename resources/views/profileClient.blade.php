@extends('layouts.app')
@section('content')

    <script>
        $('#exampleModal').on('show.bs.modal', event => {
            var button = $(event.relatedTarget);
            var modal = $(this);
            // Use above variables to manipulate the DOM
        });
    </script>
    <div class="col-md-12" style="margin-top: 80px;">
        @include('toast::messages')
        <div class="panel panel-default" style="border-top-color: #e74c3c;">
            <div class="panel-heading text-center"><h4><strong> Thông tin khách hàng {{$User->name}}</strong></h4>
                @if($User->status == 1 )
                    <p class="alert alert-danger">Tài Khoản Khách hàng đang bị khóa. Cần liên hệ với quản trị hệ thống
                        để mở lại tài khoản</p>
                @endif</div>
            <div class="panel-body">
                <form class="form-horizontal" method="POST" action="{{route('user.edit')}}">
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
                    @if($User->status == 0 )
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                Sửa Thông tin
                            </button>
                        </div>
                    @endif
                </form>
            </div>
            </form>
        </div>
    </div>
    </div>
@endsection
