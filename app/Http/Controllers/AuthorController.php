<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::withCount(['books as voters' => function ($query) {
            $query->join('ratings', 'books.id', '=', 'ratings.book_id')
                ->where('ratings.score', '>', 5);
        }])
            ->orderByDesc('voters')
            ->take(10)
            ->get();

        return view('authors.index', compact('authors'));
    }
}
