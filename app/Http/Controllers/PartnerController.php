<?php

namespace App\Http\Controllers;

use App\Hotel;
use App\Partner;
use App\Reservation;
use App\Facility;
use App\User;
use Illuminate\Support\Facades\DB;

class PartnerController extends Controller
{
    public function index()
    {
        // Displays the Partners List for the Admin.
        $Partners = DB::table('partners')->paginate(5);

        return view('adminM.ListPartner', compact('Partners'));
    }

    //Downgrades A partner which has been selected by Admin to a normal User.
    public function remove(Partner $partner, User $user)
    {
        $Id = $partner->id;
        $SelectedPartner = $partner->find($Id);
        $UID = $partner->user_id;
        if ($SelectedPartner->Status == 1) {
            $SelectedPartner->Status = 0;
            $SelectedPartner->hotels()->update(['status' => '3']);
        }
        $SelectedPartner->save();
        toast()->success('Block khách sạn thành công');
        return back();
    }

    public function unremove(Partner $partner, User $user)
    {
        $Id = $partner->id;
        $SelectedPartner = $partner->find($Id);
        $UID = $partner->user_id;
        if ($SelectedPartner->Status == 0) {
            $SelectedPartner->Status = 1;
            $SelectedPartner->hotels()->update(['status' => '0']);
        }
        $SelectedPartner->save();

        toast()->success('UnBlock khách sạn thành công');
        return back();
    }

    public function addHotel(Partner $partner)
    {
        $facilities =Facility::pluck('name','id')->all();
        $array = ['Ninh Hải','Ninh Xuân', 'Ninh Bình', 'Trường yên' ,
                  'Gia Sinh' ,'Nho Quan'];
        return view('partners.addhotel', compact('partner','array','facilities'));
    }

    // Partner can View All the Hotels Confirmed Reservations
    public function HotelReservations(Hotel $hotel, Reservation $reservation)
    {
        $HotelId = $hotel->id;
        $Hotel = Hotel::find($HotelId);
        $Reservations=  DB::table('reservations')->where('hotel_id', '=', $HotelId)->latest()->paginate(5);
        return view('partners.hotels.viewReservations', compact('Reservations', 'Hotel'));
    }

    public function countynb()
    {
            $Hotels = Hotel::where('County','Ninh Bình')->get();
        return view('hotels.allhotels', compact('Hotels'));
    }

    public function countynh()
    {
            $Hotels = Hotel::where('County','Ninh Hải')->get();
        return view('hotels.allhotels', compact('Hotels'));
    }

    public function countynx()
    {
        $Hotels = Hotel::where('County','Ninh Xuân')->get();
        return view('hotels.allhotels', compact('Hotels'));
    }

    public function countyty()
    {
        $Hotels = Hotel::where('County','Trường Yên')->get();
        return view('hotels.allhotels', compact('Hotels'));
    }

    public function countygs()
    {
        $Hotels = Hotel::where('County','Gia Sinh')->get();
        return view('hotels.allhotels', compact('Hotels'));
    }

    public function countynq()
    {
        $Hotels = Hotel::where('County','Nho Quan')->get();
        return view('hotels.allhotels', compact('Hotels'));
    }

}
