@extends('layouts.app')

@section('content')
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">🏆 Top 10 Penulis</h2>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border rounded-lg shadow-md">
            <thead class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                <tr>
                    <th class="py-3 px-6 text-left">Nama Penulis</th>
                    <th class="py-3 px-6 text-center">Jumlah Pemilih (Rating > 5)</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @forelse ($authors as $author)
                    <tr class="border-b hover:bg-gray-100">
                        <td class="py-3 px-6">{{ $author->name }}</td>
                        <td class="py-3 px-6 text-center">{{ $author->voters }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2" class="py-4 px-6 text-center text-gray-500">Tidak ada data ditemukan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
