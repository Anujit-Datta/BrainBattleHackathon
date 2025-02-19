<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'isbn',
        'count_lest',
        'available',
    ];

    public static function create(array $data): void
    {
        $books = new Books();
        $books->title = $data['title'];
        $books->isbn = $data['isbn'];
        $books->count_lest = $data['copies_left'];
        $books->available = $data['available'];
        $books->save();
    }

    public static function get($isbn): Books
    {
        return Books::all()->where('isbn', $isbn)->first();
    }


    public static function checkIn($isbn): void
    {
        $books = new Books();
        $books::all()->where('isbn', $isbn)->first()->increment('copies_left');
        $books->save();
    }

    public static function checkOut($isbn): void
    {
        $books = new Books();
        $books::all()->where('isbn', $isbn)->first()->decrement('copies_left');
        $books->save();
    }


}
