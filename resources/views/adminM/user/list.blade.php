@extends('adminM.master')
@section('content')

    <div class="col-lg-12" style="border-bottom: black solid 1px;">
        <h1 class="page-header text-center"><?php// echo $type ?>
            <strong>Danh sách User</strong>
        </h1>
    </div>
    <!-- /.col-lg-12 -->
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="border-bottom: black solid 1px; font-family: 'Times New Roman'">
        @include('toast::messages')
        <table class="table table-striped table-bordered table-hover table-responsive" id="listusers">
            <thead>
            <tr align="center" style="font-size: 18px">
                <th class="text-center">ID</th>
                <th class="text-center">Name</th>
                <th class="text-center">Email</th>
                <th class="text-center">Quyền</th>
                <th class="text-center">Trạng thái</th>
                <th class="text-center">Ngày tạo</th>
                <th class="text-center">Sửa</th>
                <th class="text-center">Xóa</th>
            </tr>
            </thead>
            <tbody style="font-size: 16px">
            @foreach($users as $key => $user)
                <tr class="odd gradeX" align="center">
                    <th class="text-center">{{$user->id}}</th>
                    <th class="text-center">{{$user->name}}</th>
                    <th style="max-width: 150px;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;"
                        class="text-center">{{$user->email}}</th>
                    <th class="text-center">
                        <?php if ($user->role_id == 1) echo "Manager Hotel"; ?>
                        <?php if ($user->role_id == 2) echo "User"; ?>
                        <?php if ($user->role_id == 4) echo "Admin"; ?>
                    </th>
                    <th class="text-center">
                        <?php if ($user->status == 0) echo "Đang hoạt động"; ?>
                        <?php if ($user->status == 1) echo "Bị chặn"; ?>
                    </th>
                    <th class="text-center">{{$user->created_at}}
                    </th>
                    <td class="center">
                        <a href="{{ route('admin.user.edit', $user->id ) }}">
                            <button type="button" class="btn btn-info">
                                <i class="fa fa-pencil fa-fw"></i> Edit
                            </button>
                        </a>
                    </td>
                    <td class="center">
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete-modal{{$user->id}}">
                            <i class="fa fa-trash"></i> Delete
                        </button>
                    </td>
                </tr>
                <div class="modal fade" id="delete-modal{{$user->id}}" tabindex="-1" role="dialog"
                     aria-labelledby="deleteNotification" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content ">
                            <div class="modal-body mx-auto mt-4">
                                <p class="text-center">Bạn có chắc chắn muốn xóa User Không?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-sm px-4 btn-secondary" data-dismiss="modal">Quay trở lại
                                </button>
                                <form action="{{ route('admin.user.delete', $user->id )}}" method="GET" >
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button type="submit" class="btn btn-sm px-4 btn-danger">Đồng ý</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            </tbody>
        </table>
        <div style="text-align: center">{{ $users->links() }}</div>
    </div>

@endsection