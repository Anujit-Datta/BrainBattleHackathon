<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Carbon\Carbon;

class Four extends Controller
{
    public function show($isbn): array
    {
        $book = Books::get($isbn);
        return [
            "isbn" => $book->isbn,
            "title" => $book->title,
            "available" => $book->copies_left > 0,
            "copies_left" => $book->copies_left,
        ];
    }
}
