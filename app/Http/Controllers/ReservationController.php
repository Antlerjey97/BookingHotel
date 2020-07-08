<?php

namespace App\Http\Controllers;
use App\RoomPhoto;
use Stripe\Stripe;
use Config;
use App\Hotel;
use App\Reservation;
use App\Room;
use App\User;
use Illuminate\Support\Facades\Auth;
use Crypt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Mail;
use PDF;
use Validator;
use App\Role;
use App\Partner;
class ReservationController extends Controller
{
    //Shows the User their Reservation Details before confirmation.
    public function index(Hotel $hotel, Room $room, Request $request)
    {

        if (Auth::check()) {
            $Id = $room->id;
            $FirstDate = $request->session()->get('checkin');
            $SecDate = $request->session()->get('checkout');
            $RoomsBooked = Reservation::where('status', 1)
                ->where('room_id', '=', $Id)
                ->where('CheckIn', '>=', $FirstDate)
                ->where('CheckOut', '<=', $SecDate)
                ->orWhere(function ($query) use ($FirstDate, $Id) {
                    $query->where('room_id', '=', $Id)
                        ->where('CheckIn', '<=', $FirstDate)
                        ->where('CheckOut', '>=', $FirstDate)
                        ->where('status', 1);
                })
                ->orWhere(function ($query2) use ($FirstDate, $SecDate, $Id) {
                    $query2->where('room_id', '=', $Id)
                        ->where('CheckIn', '>=', $FirstDate)
                        ->where('CheckIn', '<=', $SecDate)
                        ->where('status', 1);
                })->count();
            $Roomsavailable = $room->TotalRooms;
            $Roomsleft = $Roomsavailable - $RoomsBooked;
            if($Roomsleft > 0) {
                $UID = Auth::id();
                $CheckIn = strtotime($FirstDate);
                $CheckInStr = date('F jS Y', $CheckIn);
                $CheckOut = strtotime($SecDate);
                $CheckOutStr = date('F jS Y', $CheckOut);
                $Difference = strtotime($SecDate) - strtotime($FirstDate);
                $StayDuration = $Difference / 86400;
                $room_photos=RoomPhoto::where('room_id',$room->id)->get();
                $Price = $room->Price;
                $TotalCost = $StayDuration * $Price;
                $ProtectedCost = Crypt::encrypt($TotalCost);
                return view('hotels.booking', compact('room_photos','hotel', 'room', 'CheckInStr', 'CheckOutStr', 'FirstDate', 'SecDate', 'StayDuration', 'TotalCost', 'ProtectedCost', 'UID'));
            }
            else {
                return redirect('/');
            }

        } else {
            return redirect('/login');
        }
    }
    public function store(Partner $partner,Hotel $hotel, Room $room, Request $request, Reservation $reservation, $first, $sec, $protectedCost )
    {
        $rules= [
            'guestName'=>'required|min:6|max:100',
            'phone' => 'required|min:10|max:11,numeric',
            
            ];
    $msg = [
            'guestName.required'=>'Trường Họ Tên Không Được Để Trống!',
            'guestName.min'=>'Tên có ít nhất 8 ký tự!',
            'guestName.max'=>'Tên  tối đa 100 ký tự!',
            'phone.required'=>'SĐT',
            'phone.max'=>'Số điện thoại tối đa 11 số',
            'phone.min'=>'Số điện thoại có tối thiểu 10 số',
            'phone.numeric'=>'Chỉ nhập số không được phép nhập ký tự'
            ];
            $validator = Validator::make($request->all(), $rules , $msg);
            
            if ($validator->fails()) {
                return redirect()->back()
                            ->withErrors($validator)
                            ->withInput();
                        } else{
                            if($request->thanhtoan=="Thanh Toán Tại Khách Sạn")
                            {
                            $uid = Auth::id();
                            $user = User::find($uid);
                            $email = $user->email;
                            $hotel = $room->hotel;
                            $partnerid=$hotel->partner_id;
                            $partner=Partner::find($partnerid);
                            $emailpartner=$partner->CompanyEmail;
                            $hotelid = $hotel->id;
                            $totalcost = Crypt::decrypt($protectedCost);
                            $reservation = new Reservation;
                            $reservation->hotel_id = $hotelid;
                            $reservation->room_id = $room->id;
                            $reservation->guestName = $request->guestName;
                            $reservation->phone = $request->phone;
                            $reservation->checkIn = $first;
                            $reservation->checkOut = $sec;
                            $reservation->totalPrice = $totalcost;
                            $reservation->statuspayment='0';
                            $reservation->status = 1;
                            // $json = json_encode($reservation);
                           $user->addReservation($reservation);
                           Mail::send('mailhotel', array('user'=>$user,'hotel'=>$hotel ,'reservation' => $reservation,"content"=>'Bạn đã đặt phòng tại khách sạn 
                                chi tiết xem tại website
                            '), function($message) use($emailpartner){
                                $message->to($emailpartner)->subject('Thông báo có đặt phòng!')->from('doducan.ltu14@gmail.com', 'HotelBooking')
                                ->sender('doducan.ltu14@gmail.com', 'HotelBooking');
                            });
                    
                            Mail::send('mailfb', array('user'=>$user, 'reservation' => $reservation,"content"=>'Bạn đã đặt phòng tại khách sạn 
                                chi tiết xem tại website
                            '), function($message) use($email){
                                $message->to($email)->subject('Thông báo đặt phòng!')->from('doducan.ltu14@gmail.com', 'HotelBooking')
                                ->sender('doducan.ltu14@gmail.com', 'HotelBooking');
                            });
                            Session::flash('status','Bạn Đã Đặt Phòng Thành Công!');
                             return view('hotels.payment');
                             
                    
                            }else if($request->thanhtoan=="Thanh Toán Qua visa")
                            {
                            $uid = Auth::id();
                            $user = User::find($uid);
                            
                            $email = $user->email;
                            $hotel = $room->hotel;
                            $partnerid=$hotel->partner_id;
                            $partner=Partner::find($partnerid);
                            $emailpartner=$partner->CompanyEmail;
                            $hotelid = $hotel->id;
                            $totalcost = Crypt::decrypt($protectedCost);
                            $reservation = new Reservation;
                            $reservation->hotel_id = $hotelid;
                            $reservation->room_id = $room->id;
                            $reservation->guestName = $request->guestName;
                            $reservation->phone = $request->phone;
                            $reservation->checkIn = $first;
                            $reservation->checkOut = $sec;
                            $reservation->totalPrice = $totalcost;
                            $reservation->statuspayment='1';
                            $reservation->status = 1;
                            $idreser=$reservation->id;
                            $user->addReservation($reservation);
                            $idreser=$reservation->id;
                           
                            //
                            Mail::send('mailhotel', array('user'=>$user,'hotel'=>$hotel ,'reservation' => $reservation,"content"=>'Bạn đã đặt phòng tại khách sạn 
                                chi tiết xem tại website
                            '), function($message) use($emailpartner){
                                $message->to($emailpartner)->subject('Thông báo có đặt phòng!')->from('doducan.ltu14@gmail.com', 'HotelBooking')
                                ->sender('doducan.ltu14@gmail.com', 'HotelBooking');
                            });
                            //
                             Mail::send('mailfb', array("name"=>'',"email"=>'','user'=>$user,'reservation'=>$reservation,"content"=>'Bạn đã đặt phòng tại khách sạn 
                                chi tiết xem tại website
                            '), function($message) use($email){
                                $message->to($email)->subject('Thông báo đặt phòng!')->from('doducan.ltu14@gmail.com', 'HotelBooking')
                                ->sender('doducan.ltu14@gmail.com', 'HotelBooking');
                            });
                            $tien = $reservation->totalPrice;
                            return view('hotels.paypal', compact('tien','email','hotel','idreser'));
                            }
                        }

        
    }
    public function show(User $user, Reservation $reservation)
    {
        $uid = Auth::id();
        $user = User::find($uid);
        $email = $user->email;
        $reservations = Reservation::where('user_id', $uid)->orderBy('CheckIn', 'desc')->latest()->paginate(5);
        return view('myreservations', compact('reservations'));
    }
    public function destroy(Reservation $reservation)
    {
//        dd( $reservation->user['email']);
        $id = $reservation->id;
        $emailUser=$reservation->user->email;
        $hotel=$reservation->hotel->name;

//        dd(Auth::user()->name);
        $reservation = Reservation::find($id);
        $reservation->status =0;
        $phone =  $reservation->hotel->partner->phone;
        $reservation->save();
        Mail::send('mailhuy', array('hotel' => $hotel,'phone' => $phone, "content"=>'Khách sạn đã hủy đặt phòng của bạn trên hệ thống
                            '), function($message) use($emailUser){
            $message->to($emailUser)->subject('Thông báo Hủy đặt phòng!')->from('doducan.ltu14@gmail.com', 'HotelBooking')
                ->sender('doducan.ltu14@gmail.com', 'HotelBooking');
        });
        Session::flash('status','Bạn Đã Hủy Phòng Thành Công!');
        return back();
    }

    public function pdfview(Request $request, Reservation $reservation)
    {
        $uid = Auth::id();
        $id = $reservation->id;
        $room = $reservation->room;
        $hotel = $room->hotel;
        $hotelphoto = $hotel->photos->first();
        $reservation = Reservation::where('id', '=', $id)->with('room')->get();
        // $pdf = PDF::loadview('pdfview', compact('reservation', 'hotel', 'hotelphoto'));
        // return $pdf->stream('pdfview.pdf');
         return view('pdfview',compact('reservation','hotel','hotelphoto'));
    }

    public function storePayment(Request $request , Reservation $reservation)
    {

        
        
        $pay = $request->money;
        $email = $request->emailuser;
        $hotel = $request->infor;
        $id=$request->id;
        $r= Reservation::find($id);
        $status=$r->statuspayment;
        
         
        \Stripe\Stripe::setApiKey("sk_test_YeyrVrdYxmFLBK4PozNf77eR");
        $token = $_POST['stripeToken'];
        try {
            $charge = \Stripe\Charge::create(array(
            'amount' =>$pay,
            'currency' => 'vnd',
            'description' => 'Payment Booking Room',
            'source' => $token,
           
            ));
        } catch (\Stripe\Error\Card $e) {
          
        $reservation = Reservation::find($id);
        $reservation->delete();
            Session::flash('status','lỗi!');
            return back();
        }
      
        Session::flash('status','Bạn Đã Đặt Phòng Thành Công!');
        return view('hotels.payment');
    }
    
}
