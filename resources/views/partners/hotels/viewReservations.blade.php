@extends('layouts.app')
@section('content')
    <body>
    <div class="top" style="border-top:1px solid black;padding-top: 100px;background-color: white">
        <div style="margin-left:10px "><h2>Danh Sách Đặt Phòng của {{$Hotel->Name}}:</h2>
            <a class="btn btn-primary pull-right" href="/home" style="">Trở về</a></div>
        <table id="example" class="table table-striped table-bordered" style="width:98%;margin-left: 10px">
            <thead>
            <tr>
                <th>STT</th>
                <th>Tên Khách:</th>
                <th>SĐT</th>
                <th>Ngày Nhận Phòng</th>
                <th>Ngày Trả Phòng</th>
                <th>Tổng Giá</th>
                <th>Trạng Thái</th>
                <th>Ngày Đặt</th>
                <th>Thao Tác</th>

            </tr>
            </thead>
            <tbody>
            <?php
            $i = 1;
            ?>
            @foreach ($Reservations  as $Reservation)

                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$Reservation->guestName}}</td>
                    <td>{{$Reservation->phone}}</td>
                    <td>{{ \Carbon\Carbon::parse($Reservation->CheckIn)->format('d/m/Y')}}</td>
                    <td>{{ \Carbon\Carbon::parse($Reservation->CheckOut)->format('d/m/Y')}}</td>
                    <td>{{number_format($Reservation->totalPrice,0)}} VNĐ</td>
                    @if($Reservation->status==1)
                        @if($Reservation->statuspayment==0)
                            <td>Chưa Thanh Toán</td>
                        @else
                            <td>Đã Thanh Toán</td>
                        @endif
                    @else
                       <td> <span style="color:red"><b>Phòng đã Hủy</b></span></td>
                    @endif
                    <td>{{ \Carbon\Carbon::parse($Reservation->created_at)->format('d/m/Y')}}</td>
                    <td class="text-center">
                            <a class="btn btn-sm btn-info"
                               href="/reservations/{{$Reservation->id}}/pdf">Xem chi tiết</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div style="text-align: center;margin-top: 10px">  {{$Reservations->links()}} </div>
    </div>
    </body>
@endsection
@section('scripts')
    <script type="text/javascript" language="javascript" class="init">
        $(document).ready(function () {
            $('#example').DataTable({
                paging: false,
                searching: false,
                bInfo: false,
            });
        });
    </script>
    <link rel="stylesheet" href="{{URL::asset('/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{URL::asset('/css/dataTables.bootstrap4.css')}}">
    <style type="text/css" class="init">
    </style>
    <!-- script -->
    <script type="text/javascript" language="javascript" src="{{URL::asset('/js/jquery-3.3.1.js')}}"></script>
    <script type="text/javascript" language="javascript" src="{{URL::asset('/js/jquery.dataTables.js')}}"></script>
    <script type="text/javascript" language="javascript" src="{{URL::asset('/js/dataTables.bootstrap4.js')}}"></script>
    @endsection

</head>
<body>



