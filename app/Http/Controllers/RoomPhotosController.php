<?php

namespace App\Http\Controllers;

use App\Room;
use App\RoomPhoto;
use Illuminate\Http\Request;

// Controller to Upload and Delete Hotel Photos
class RoomPhotosController extends Controller
{
    // Shows the Upload Form.
    public function uploadPhoto(Room $room)
    {
        return view('partners.hotels.rooms.newphotos', compact('room'));
    }

    // Inserts the newly uploaded Photos path in the database.

    public function addphoto(Request $request, Room $room)
    {
        $File = $request->file('file');
        $Name = time() . $File->getClientOriginalName();
        $File->move('roomphotos/photos', $Name);
        $room->photos()->create(['path' => "/roomphotos/photos/{$Name}"]);
    }

    //Removes the photo
    public function destroy(Request $request, Room $room, RoomPhoto $roomphoto)
    {
        $Id = $roomphoto->id;
        $Photo = RoomPhoto::find($Id);
        $Photo->delete();
        return back();

    }

}
