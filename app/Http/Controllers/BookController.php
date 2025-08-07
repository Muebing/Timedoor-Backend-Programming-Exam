<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->input('list', 10);
        $search = $request->input('search');

        $books = Book::with(['author', 'category'])
            ->withAvg('ratings', 'score')
            ->withCount('ratings as voters')
            ->when($search, function ($query, $search) {
                $query->where('title', 'like', "%$search%")
                    ->orWhereHas('author', function ($q) use ($search) {
                        $q->where('name', 'like', "%$search%");
                    });
            })
            ->orderByDesc('ratings_avg_score')
            ->paginate($perPage);

        return view('books.index', compact('books', 'perPage', 'search'));
    }
}
