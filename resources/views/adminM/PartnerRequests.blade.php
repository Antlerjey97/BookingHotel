@extends('adminM.master')
@section('content')
<div class="col-md-12" style="margin-top: 30px;">
        <div class="panel panel-default" style="border-top-color: #e74c3c;font-family: 'Times New Roman'">
            <div class="panel-heading text-center"><h4>Yêu cầu của đối tác từ người dùng:</h4></div>
            <div class="panel-body">
      <ul>
          @if(count($Proposals)>0)
        <table class="table">
          <thead>
            <tr>
            <th>Tên công ty</th>
            <th>Email</th>
            <th>Địa chỉ </th>
            <th>Mô tả</th>
            </tr>
          </thead>
          <tbody>
                <!-- Displays a list of all the partner Proposals sent to Check-In.com and an Accept/Refuse Button -->
              @foreach ($Proposals as $Proposal)
                <tr>
                  <td><a class="" href="#">{{$Proposal->CompanyName}}</a></td>
                  <td>{{$Proposal->CompanyEmail}}</td>
                  <td>{{$Proposal->HQAddress}}</td>
                  <td>{{$Proposal->Vision}}</td>
                      <td><a class="btn btn-success " href="/admin/proposal/{{$Proposal->id}}/accept">Chấp nhận</a>
                      <a class="btn btn-danger" style="margin-left :0" href="/admin/proposal/{{$Proposal->id}}/decline">Từ chối</a></td>
                </tr>
              @endforeach

          @else
              <div class="alert alert-default-primary text-center">
                 Không có Yêu cầu đối tác nào.
              </div>
          @endif
         </tbody>
     </table>
      <a href="/home" class="btn btn-info">Trở về trang chủ.</a>
    </div>
    </div>
    </div> 
@endsection