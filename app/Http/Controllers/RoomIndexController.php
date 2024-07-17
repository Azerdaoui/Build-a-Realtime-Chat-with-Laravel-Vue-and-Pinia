<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use App\Http\Resources\MessageResource;

class RoomIndexController extends Controller
{
    public function __invoke(Room $room)
    {
        return MessageResource::collection(
            $room->messages()->with('users')->latest()->paginate(100)
        );
    }
}
