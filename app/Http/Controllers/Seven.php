<?php

namespace App\Http\Controllers;

use App\Models\Alert;
use App\Models\ResponseTeam;
use App\Models\WifiLogins;
use Carbon\Carbon;
use Illuminate\Http\Request;

class Seven extends Controller
{
    public function store(Request $request): array
    {
        $validated = $request->validate([
            'type' => 'required',
            'location' => 'required',
            'details' => '',
        ]);


        $alert = Alert::create($request);

        $response_team = ResponseTeam::getAll();

        $team = $response_team->where('type', $alert->type);

        return [
            "message" => "Emergency alert sent",
            "response_team" => $team->first()->response_team,
        ];
    }
}
