<?php

namespace App\Http\Controllers;

use App\Models\WifiLogins;
use Carbon\Carbon;
use Illuminate\Http\Request;

class Three extends Controller
{
    public function store(Request $request): array
    {
        $validated = $request->validate([
            'student_id' => 'required',
            'timestamp' => 'required|date_format:Y-m-d\TH:i:s\Z',
        ]);
        $validated['timestamp'] = Carbon::parse($validated['timestamp'])->utc();

        WifiLogins::create($validated);

        return [
            "message" => "login recorded",
            "student_id" => $validated['student_id'],
            "login_count" => WifiLogins::count($validated['student_id']),
        ];
    }
}
