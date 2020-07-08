<?php

namespace App\Http\Controllers; 

use App\Hotel; 
use App\Partner; 
use App\Reservation; 
use Carbon\Carbon; 
use ConsoleTVs\Charts\Facades\Charts;
use DB;
use Illuminate\Http\Request;

//County
class ChartsController extends Controller {
public function index(Partner $partner) {
// Use the current Users Partner ID to find hotels provided by the logged in partner and places the ID's of these hotels into an Array.
        $PartnerId = $partner->id;
        $Hotels = Hotel::where('partner_id', '=', $PartnerId)->get();
        $HotelId = $Hotels->pluck('id');
    $HotelCountry = $Hotels->pluck('County');
//        $TotalEarnings = Reservation::where('hotel_id', $HotelId)->sum('totalPrice');
        $MonthlyEarnings = DB::table('reservations')
            ->whereIn('hotel_id', $HotelId)
            ->where('status', 1)
            ->where('created_at', '>=', Carbon::now()->startOfMonth())
            ->sum('totalPrice');
        $GetReserv = Reservation::whereIn('hotel_id', $HotelId)
            ->where('created_at', '>=', Carbon::now()->startOfMonth())
            ->where('status', 1)
            ->get();
        foreach ($HotelId as $Id) {
            $NumOfReserv[] = $GetReserv->where('hotel_id', '=', $Id)->count();
        }
//    $NumOfCountey[] = $GetReserv->where('County', '=', $HotelCountry)->count();
        /* Creates 3 charts , 1. Total Bookings for each hotel in the current month ,
        2 .Number of hotels per country
        3.Earnings In the current month         */
        $chart = Charts::create('bar', 'highcharts')
            ->title('Tổng số đặt chỗ tại Khách sạn')
            ->elementLabel('Số lượng đặt phòng')
            ->labels($Hotels->pluck('Name'))
            ->values($NumOfReserv)
            ->dimensions(1000, 500)
            ->responsive(true);
        $chart3 = Charts::create('percentage', 'justgage')
            ->title('Tổng thu nhập từ tháng này')
            ->elementLabel('VND')
            ->values( [$MonthlyEarnings])
            ->responsive(false)
            ->height(300)
            ->width(0);

        return view('partners.viewcharts', ['chart' => $chart, 'chart3' => $chart3, 'partner' => $PartnerId]);
    }

    public function getRevenueOfMonth($partner, Request $request)
    {
        $Hotels = Hotel::where('partner_id', '=', $partner)->get();
        $HotelId = $Hotels->pluck('id');
        $HotelCountry =$Hotels->pluck('County');
        $startOfMont = $request->input('startDate');
        $endofMont = $request->input('endDate');
        $betweenMonths = Reservation::whereBetween('created_at', [$startOfMont, $endofMont])
            ->sum('totalPrice');
        $GetReserv = Reservation::whereIn('hotel_id', $HotelId)
            ->whereBetween('created_at', [$startOfMont, $endofMont])
            ->where('status', 1)
            ->get();
        foreach ($HotelId as $Id) {
            $NumOfCountey[] = $GetReserv->where('County', '=', $HotelCountry)->count();
            $NumOfReserv[] = $GetReserv->where('hotel_id', '=', $Id)->count();
        }
        $chart = Charts::create('bar', 'highcharts')
            ->title('Tổng số đặt chỗ tại khu vực từ '. $startOfMont.' đến '. $endofMont)
            ->elementLabel('Số lượng đặt phòng')
            ->labels($Hotels->pluck('Name'))
            ->values($NumOfReserv)
            ->dimensions(1000, 500)
            ->responsive(true);
        $title ='Tổng thu nhập từ '. $startOfMont.' đến '. $endofMont;
        $chart3 = Charts::create('percentage', 'justgage')
            ->title($title)
            ->elementLabel('VND')
            ->values([$betweenMonths],'#,###.#')
            ->responsive(false)
            ->height(300)
            ->width(0);

        return view('partners.viewcharts', ['chart' => $chart, 'chart3' => $chart3,'partner'=>$partner]);
    }
}
