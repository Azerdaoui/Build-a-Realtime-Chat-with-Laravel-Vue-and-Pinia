<?php

namespace App\Http\Controllers;

use App\Http\Resources\RoomResource;
use App\Models\Room;

class RoomShowController extends Controller
{
    public function __invoke(Room $room)
    {
        return inertia()->render('Room', [
            'room' => RoomResource::make($room),
        ]);
    }
}
