
@extends('adminM.master')
@section('content')
    @include('toast::messages')
    <div class="col-md-12" style="margin-top: 30px;">
        <div class="panel panel-default" style="border-top-color: #e74c3c;">
            <div class="panel-heading"><h3><strong>Thêm mới user</strong></h3></div>
            <div class="panel-body">
                <form class="form-horizontal" method="POST" action="{{route('admin.create.user')}}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group" style="font-size: 18px">
                        <label for="name" class="col-md-4 control-label">Tên :</label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" >
                            @if($errors->has('name'))
                                <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('name') }}</strong></span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group" style="font-size: 18px">
                        <label for="email" class="col-md-4 control-label">E-Mail : </label>
                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email')  }}" />
                            @if($errors->has('email'))
                                <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('email') }}</strong></span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group" style="font-size: 18px">
                        <label for="password" class="col-md-4 control-label">Mật khẩu :</label>
                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control" name="password"  value="{{ old('password')  }}" />
                            @if($errors->has('password'))
                                <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('password') }}</strong></span>
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

@endsection

