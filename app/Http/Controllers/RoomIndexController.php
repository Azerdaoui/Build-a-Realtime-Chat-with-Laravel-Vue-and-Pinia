<?php

namespace App\Http\Controllers;

use App\Http\Resources\MessageResource;
use App\Models\Room;

class RoomIndexController extends Controller
{
    public function __invoke(Room $room)
    {
        return MessageResource::collection(
            $room->messages()->with('users')->latest()->paginate(100)
        );
    }
}
