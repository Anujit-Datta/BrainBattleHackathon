<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

class Two extends Controller
{
    public function show($id): array
    {
        if ($id < 210001 || $id > 260000) {
            return [
                "status" => "failed",
                "message" => "ID not found, valid ID is between 210001 and 260000",
            ];
        }

        $room = ($id / 100) % 1000;
        $seat = $id % 100;

        if ($room > 100 && $room % 100 == 0) {
            $room = $room - 90;
        }

        if ($seat == 0) {
            $room -= 1;
            $seat = 100;
        }

        return [
            "student_id" => $id,
            "exam_room" => $room,
            "seat_number" => $seat == 0 ? 100 : $seat,
        ];
    }
}
