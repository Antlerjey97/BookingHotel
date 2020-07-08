<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// A model for the Room Photos of a Hotel.
class RoomPhoto extends Model
{
    protected $table = 'room_photos';
    protected $fillable = ['path'];
    public function room() {

        return $this->belongsTo(Room::class);
    }
}
