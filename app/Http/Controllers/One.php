<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

class One extends Controller
{
    public function show(): array
    {
        return [
            "status" => "ok",
            "server_time" => Carbon::now()->utc(), // return the current utc date_time of the server
        ];
    }
}
