<?php

namespace App\Http\Controllers;

use App\Hotel;
use App\Http\Requests\RoomResquest;
use App\Room;
use Illuminate\Http\Request;

class RoomsController extends Controller
{
    // Adds a new Room to a Hotel
    public function store(RoomResquest $request, Hotel $hotel)
    {

        $Room = new Room($request->all());

        $hotel->addRoom($Room);
        $room=$Room->id;

        return view('partners.hotels.rooms.addphoto',compact('room'));
    }

    public function edit(Room $room)
    {

        return view('partners.hotels.rooms.editroom', compact('room'));

    }

    // Updates the specific room's details in the database.
    public function update(RoomResquest $request, Room $room)
    {

        $room->update($request->all());
        return back();

    }

    // Removes the room from the Hotel.
    public function destroy(Request $request, Room $room)
    {

        $Id = $room->id;
        $Room = $room->find($Id);
        $Room->delete();

        return back();
    }

    public function listRoom($id){
        $hotel= Hotel::find($id);

        return view('partners.hotels.rooms.listRoom',compact('hotel'));
    }

    public function addgetroom($id){
        $hotel= Hotel::find($id);
        return view('partners.hotels.rooms.addRoom',compact('hotel'));
    }

}
