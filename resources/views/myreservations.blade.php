@extends('layouts.app')

@section('content')
  <a class="btn btn-default pull-right" href="/home">Trở về</a>
  <div class="row">
      <div class="col-md-8 col-md-offset-2" style="margin-top: 69px;">
          <div>
              @if (session('status'))
               <div class="alert alert-success">{{session('status')}}</div>
           @endif
          </div>
      </div>
      <div class="panel panel-default" style="border-top-color: #e74c3c;padding-top: 80px;">
          <a style="margin: 10px 20px 0 0" href="/home" class="btn btn-primary pull-right"> Trở lại</a>
          <div class="panel-heading"><h2><b>Lịch sử đặt chỗ :</b></h2>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
              @if(count($reservations)>0)
                  <table style="border: black solid 1px;font-family: 'Times New Roman'"
                         class="table table-striped table-bordered table-hover table-responsive" id="listusers">
                      <thead>
                      <tr align="center" style="font-size: 20px">
                          <th class="text-center">Tên khách sạn</th>
                          <th class="text-center">Phòng trọ</th>
                          <th class="text-center" style="width: 12%">Tên khách hàng</th>
                          <th class="text-center">SĐT</th>
                          <th class="text-center">Ngày đến</th>
                          <th class="text-center">Ngày đi</th>
                          <th class="text-center">Ngày đặt</th>
                          <th class="text-center" style="width: 10%">Tổng Giá</th>
                          <th class="text-center" style="width: 12%">Trạng thái</th>
                          <th class="text-center" style="width: 19%">Xem chi tiết</th>
                      </tr>
                      </thead>
                      <tbody style="font-size: 18px">
                      @if(count($reservations)>0)
                          @foreach (@$reservations  as $reservation)

                              <tr class="odd gradeX" align="center">
                                  <td class="text-center">{{@$reservation->room->hotel->Name}}</td>
                                  <td class="text-center">{{$reservation->room['RoomType']}}</td>
                                  <td class="text-center">{{$reservation->guestName}}</td>
                                  <td class="text-center">{{$reservation->phone}}</td>
                                  <td class="text-center">{{ \Carbon\Carbon::parse($reservation->CheckIn)->format('d/m/Y')}}</td>
                                  <td class="text-center">{{ \Carbon\Carbon::parse($reservation->CheckOut)->format('d/m/Y')}}</td>
                                  <td class="text-center">{{ \Carbon\Carbon::parse($reservation->created_at)->format('d/m/Y')}}</td>
                                  <td class="text-center">{{number_format($reservation->totalPrice,0)}} vnd.</td>
                                  <td class="text-center">@if($reservation->statuspayment==0)
                                          <p><b>Chưa Thanh Toán</b></p>
                                      @else
                                          <p><b>Đã Thanh Toán</b></p>

                                      @endif</td>
                                  <td class="text-center">
                                      @if($reservation->status==1)
                                          <a style="font-size: 13px" class="btn btn-danger pull-left"
                                             onclick="return confirm('Bạn Có Muốn Hủy?')"
                                             href="/reservations/{{$reservation->id}}/cancel">Hủy Dặt Phòng</a>
                                      @else
                                          <span class="pull-left" style="color: blue"><b>Phòng đã hủy</b></span>
                                      @endif
                                      <a style="font-size: 13px" class="btn btn-primary pull-right "
                                         href="/reservations/{{$reservation->id}}/pdf">Xem Chi Tiết</a></td>
                              </tr>
                          @endforeach
                      @else
                          <div class="alert alert-info" style="text-align: center">Chưa có đơn đặt hàng</div>
                      @endif
                      </tbody>
                  </table>
                  <div style="text-align: center"> {{$reservations->links()}}</div>
              @else
                  <div class="alert alert-info" style="text-align: center">Bạn chưa có đơn đặt phòng</div>
              @endif
          </div>
      </div>
  </div>
@endsection
