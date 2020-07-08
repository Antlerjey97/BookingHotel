@extends('layouts.app')
@section('content')
  <div class="row">
      <div class="container-fluid">
          <div class="panel panel-default" style="border-top-color: #e74c3c; margin-top: 100px">
              <a class="btn btn-primary pull-right" href="/" style="margin-top: 5px;margin-right:5px ">Trở về</a>
              <div class="panel-heading">Khách Sạn</div>
              <div class="panel-body">
    <!-- Displays Each Hotel as a "Card" and a button to visit the hotels page. -->
                  <div class="row">
                      @if(count($Hotels)>0)
                          @foreach ($Hotels as $Hotel)
                              <div class="col-sm-3">
                                  <div class="card" style="height: 495px !important;">
                                      <div>
                                          <img class="card-img-top" style="height: 250px; width: 100%; padding: 7px"
                                               src="{{$Hotel->thumbnail->path}}" alt="Card image">
                                      </div>
                                      <div class="card-block">
                                          <h4 class="card-Title">{{ $Hotel->Name}}</h4>
                                          <p class="card-text">{{$Hotel->description}}</p>
                                      </div>
                                      @if (Auth::check())
                                          <a href="/hotels/{{$Hotel->id}}" class="btn btn-primary"
                                             style="float: right;margin: 0px 10px 5px 10px;">Xem</a>
                                      @else
                                          <a href="/login" class="btn btn-primary"
                                             style="float: right;margin: 0px 10px 5px 10px;">Xem</a>
                                      @endif
                                  </div>
                              </div>
                          @endforeach
                      @else
                          <div class="alert alert-info" style="text-align: center">Không tìm thấy khách sạn nào</div>
                      @endif
                  </div>


              </div>
          </div>
</div>
  </div>
      <style>
          .card .card-block {
              max-height: 300px !important;
              overflow: auto;
          }

          .card {
              display: inline-block;
          }
      </style>
@section('scripts')
          <script>
              $(document).ready(function ()
              { $(".card-text").each(function(i){
                  var len=$(this).text().trim().length;
                  if(len>100)
                  {
                      $(this).text($(this).text().substr(0,100)+'...');
                  }
              });
              });</script>
    @endsection
@endsection
