@extends('layouts.app')

@section('content')
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">📚 Daftar Buku</h2>

    <form method="GET" action="{{ route('books.index') }}" class="flex flex-wrap items-center mb-6 gap-4">
        <input type="text" name="search" placeholder="Cari Buku/Penulis" value="{{ $search }}"
            class="w-full md:w-1/3 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">

        <select name="list" class="px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
            @foreach ([10, 20, 30, 50, 100] as $size)
                <option value="{{ $size }}" {{ $perPage == $size ? 'selected' : '' }}>{{ $size }}</option>
            @endforeach
        </select>

        <button type="submit"
            class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition duration-200">
            Filter
        </button>
    </form>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border rounded-lg shadow-md">
            <thead class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                <tr>
                    <th class="py-3 px-6 text-left">Judul Buku</th>
                    <th class="py-3 px-6 text-left">Penulis</th>
                    <th class="py-3 px-6 text-left">Kategori</th>
                    <th class="py-3 px-6 text-center">Rata-rata Rating</th>
                    <th class="py-3 px-6 text-center">Jumlah Pemilih</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @forelse ($books as $book)
                    <tr class="border-b hover:bg-gray-100">
                        <td class="py-3 px-6">{{ $book->title }}</td>
                        <td class="py-3 px-6">{{ $book->author->name }}</td>
                        <td class="py-3 px-6">{{ $book->category->name }}</td>
                        <td class="py-3 px-6 text-center">{{ number_format($book->ratings_avg_score, 2) }}</td>
                        <td class="py-3 px-6 text-center">{{ $book->voters }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="py-4 px-6 text-center text-gray-500">Tidak ada data ditemukan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $books->appends(['search' => $search, 'list' => $perPage])->links('pagination::tailwind') }}
    </div>
@endsection
