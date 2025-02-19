<?php

namespace App\Http\Controllers;

use App\Models\Alert;
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


        Alert::create($request);

        return [
            "message" => "Emergency alert sent",
            "response_team" => $validated['student_id'],
        ];
    }
}
