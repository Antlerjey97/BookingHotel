@extends('layouts.app')
@section('charts')
  {!! Charts::assets() !!}

@endsection
@section('content')

<!-- Loads all the charts from the controller onto the page -->
 <div class="container" >
  <div style="margin-top: 69px">
      <form action="{{route("partner.chart",[$partner])}}" method="POST">
          <input type="hidden" name="_token" value="{{csrf_token()}}">
          <div class="row">
              <div class="col-md-4">
                  <div class="form-group">
                      <input type="date" class="form-control startDate" name="startDate"
                             value="{{old('startDate') ?? \Carbon\Carbon::now()->startOfMonth() }}"/>
                  </div>
              </div>
              <div class="col-md-4">
                  <div class="form-group">
                      <input type="date" class="form-control endDate" name="endDate" value="{{old('endDate') ?? \Carbon\Carbon::now()->endOfMonth() }}"/>
                  </div>
              </div>
              <div class="col-md-4">
                  <button type="submit" id="search" class="btn btn-primary">Tìm kiếm</button>
              </div>
          </div>
      </form>
    {!! $chart->render() !!}
    <hr />

    <center> <h3>Thu nhập</h3>  </center>
{{--      {{$chart3->values[0] = number_format($chart3->values[0],4,",",".")}}--}}
{{--      {{dd($chart3)}}--}}
    {!! $chart3->render() !!}
{{--      {{dd(number_format($chart3->values[0]),$chart3)}}--}}


  </div>
</div>

{{--<script>--}}
{{--    $(document).ready(function () {--}}
{{--        $("#search").click(function (e) {--}}
{{--            e.preventDefault();--}}
{{--            $.ajax({--}}
{{--                type: "POST",--}}
{{--                url: "{{route("partner.chart",[$partner])}}",--}}
{{--                data: {startDate: $(".startDate").val(),endDate :$(".endDate").val() , "_token": "{{ csrf_token() }}"},--}}

{{--            });--}}
{{--        });--}}
{{--    });--}}
{{--</script>--}}
<style>.startDate:before {
        content: "Từ Tháng:";
        font-weight: bold;
    }

    .endDate:before {
        content: "Đến tháng:";
        font-weight: bold;
    }</style>


 @endsection
