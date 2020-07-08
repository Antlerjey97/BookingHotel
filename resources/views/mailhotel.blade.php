<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <link rel="stylesheet" href="">
</head>
<body>
<div class="form-group">
    <p><b>Xin chào:{{($hotel->Name)}}</b> !</p>
    <p><b>Khách sạn bạn vừa nhận được lượt đặt phòng!</b></p>
<br>
    <p><b>Thông Tin Đặt Phòng Như Sau: </b></p>
    <p><b>Tên Người Đặt:{{$reservation->guestName}}</b></p>
    <p><b>SĐT:{{$reservation->phone}}</b></p>
    <p><b>Ngày Nhận Phòng:{{ \Carbon\Carbon::parse($reservation->checkIn)->format('d/m/Y')}}.</b></p>
    <p><b>Ngày Trả Phòng:{{ \Carbon\Carbon::parse($reservation->checkOut)->format('d/m/Y')}}.</b></p>
    <p><b>Tổng Tiền:{{number_format($reservation->totalPrice) }}VND.</b></p>
@if($reservation->statuspayment==0)
        <p><b>Trạng Thái Thanh Toán: Chưa Thanh Toán</b></p>
@else
        <p><b>Trạng Thái Thanh Toán: Đã Thanh Toán</b></p>
@endif
</div>
</body>
</html>