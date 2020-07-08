@extends('adminM.master')
@section('content')
    @include('toast::messages')
    <div class="col-md-12" style="margin-top: 30px;">
        <div class="panel panel-default" style="border-top-color: #e74c3c;">
            <div class="panel-heading"><h4><strong> Edit account {{$user->name}}</strong></h4></div>
            <div class="panel-body">
                <form class="form-horizontal" method="POST" action="{{route('admin.edit', $user->id)}}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group" style="font-size: 18px">
                        <label for="name" class="col-md-4 control-label">Tên</label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') ?? $user->name }}" >
                            @if($errors->has('name'))
                                <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('name') }}</strong></span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group" style="font-size: 18px">
                        <label for="email" class="col-md-4 control-label">E-Mail </label>
                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') ?? $user->email }}" />
                            @if($errors->has('email'))
                                <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('email') }}</strong></span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group" style="font-size: 18px">
                        <label for="password" class="col-md-4 control-label">Mật khẩu</label>
                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control" name="password"  value="{{ old('password') ?? $user->password }}" />
                            @if($errors->has('password'))
                                <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('password') }}</strong></span>
                            @endif
                        </div>
                    </div>
                    <div class="form-check">
                        <label for="" class="col-md-4 control-label"> </label>
                        <div class="col-md-6">
                            <input type="checkbox" class="form-check-input" name="check" value="1" {{$user->status == 1 ? "checked" :""}}>
                            <label class="form-check-label" for="exampleCheck1">Block</label></div>
                    </div>
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                Sửa tài khoản
                            </button>
                        </div>
                </form>
            </div>
        </div>
    </div>

@endsection
