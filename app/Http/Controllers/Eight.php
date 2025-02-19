<?php

namespace App\Http\Controllers;



use App\Models\notice;

class Eight extends Controller
{
    public function show(): array
    {
        $notices = Notice::get();
        return $notices->toArray();
    }
}
