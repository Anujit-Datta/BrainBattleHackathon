<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class WifiLogins extends Model
{
    protected $fillable = [
        'student_id',
        'timestamp',
    ];

    protected $casts = [
        'timestamp' => 'datetime',
    ];

    public static function create(array $data): void
    {
        $wifiLogins = new WifiLogins();
        $wifiLogins->student_id = $data['student_id'];
        $wifiLogins->timestamp = $data['timestamp'];
        $wifiLogins->save();
    }

    public static function count($id): int
    {
        $wifiLogins = new WifiLogins();
        return $wifiLogins::all()->where('student_id', $id)->count();
    }
}
