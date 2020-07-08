@extends('adminM.master') 
@section('content')
<div class="">
  <div class="col-lg-12"   style="border-bottom: black solid 1px; margin-top: 20px;" >
    @include('toast::messages')
      <div class="panel-heading text-center"><h4><b>Tất cả đối tác with HotelBooking</b></h4></div>
          <table class="table table-striped table-bordered table-hover table-responsive" id="listusers" style="border: black solid 1px">
            <thead>
            <tr align="center" style="font-size: 18px">
              <th class="text-center">ID</th>
              <th class="text-center">Company Name</th>
              <th class="text-center">Email Company</th>
              <th class="text-center">Phone</th>
              <th class="text-center">Address </th>
              <th class="text-center">Trạng thái</th>
              <th class="text-center">Ngày tạo</th>
              <th class="text-center">Block</th>
              <th class="text-center">UnBlock</th>
            </tr>
            </thead>
            <tbody style="font-size: 16px">
            @foreach($Partners as $key => $Partner)
              <tr class="odd gradeX" align="center">
                <th class="text-center">{{$key}}</th>
                <th class="text-center">{{$Partner->CompanyName}}</th>
                <th class="text-center">{{$Partner->CompanyEmail}}</th>
                <th class="text-center">{{$Partner->phone}}</th>
                <th class="text-center">{{$Partner->HQAddress}}</th>
                <th class="text-center">
                  <?php if ($Partner->Status == 1) echo "Online"; ?>
                  <?php if ($Partner->Status == 0) echo "Block"; ?>
                </th>
                <th class="text-center">{{$Partner->created_at}}
                </th>
                <td class="center">
                  <button type="button" class="btn btn-danger" data-toggle="modal"
                          data-target="#delete-modal{{$Partner->id}}">
                    <i class="fa fa-trash"></i> Block
                  </button>
                  {{--                style="pointer-events: none;"--}}
                </td>
                <td>
                  <a href="{{route('admin.unremove.partner', $Partner->id)}}">
                    <button class="btn btn-info">UnBlock</button>
                  </a>
                </td>
              </tr>
              <div class="modal fade" id="delete-modal{{$Partner->id}}" tabindex="-1" role="dialog"
                   aria-labelledby="deleteNotification" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content ">
                    <div class="modal-body mx-auto mt-4">
                      <p class="text-center">Bạn có chắc chắn muốn xóa User Không?</p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-sm px-4 btn-secondary" data-dismiss="modal">Quay trở lại
                      </button>
                      <form action="{{route('admin.remove.partner', $Partner->id)}}" method="GET">
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
          <div style="text-align: center">{{ $Partners->links() }}</div>
        </tbody> 
      </table>
    <hr>
      {{-- @endforeach --}}
    </div>
    <a href="/home" class="btn btn-info">Trở về trang chủ</a>
  </div>
</div>
@endsection