@extends('layouts.app')

@section('content')
    @if (session('success'))
        <div class="mb-6 p-4 bg-green-100 text-green-800 rounded-md">
            {{ session('success') }}
        </div>
    @endif

    <h2 class="text-2xl font-semibold text-gray-800 mb-6">⭐ Tambah Rating Buku</h2>

    <form method="POST" action="{{ route('ratings.store') }}" class="space-y-6" id="rating-form">
        @csrf

        <div>
            <label for="author-select" class="block text-sm font-medium text-gray-700 mb-2">Pilih Penulis</label>
            <select id="author-select" required
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                <option value="">-- Pilih Penulis --</option>
                @foreach ($authors as $author)
                    <option value="{{ $author->id }}">{{ $author->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="book-select" class="block text-sm font-medium text-gray-700 mb-2">Pilih Buku</label>
            <select name="book_id" id="book-select" required
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                <option value="">-- Pilih Buku --</option>
            </select>
        </div>

        <div>
            <label for="score" class="block text-sm font-medium text-gray-700 mb-2">Rating</label>
            <select name="score" id="score" required
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                @for ($i = 1; $i <= 10; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>
        </div>

        <div>
            <button type="submit"
                class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 transition duration-200">
                Kirim Rating
            </button>
        </div>
    </form>

    <script>
        const authorBooks = @json($authors->mapWithKeys(fn($a) => [$a->id => $a->books->map(fn($b) => ['id' => $b->id, 'title' => $b->title])]));
        const authorSelect = document.getElementById('author-select');
        const bookSelect = document.getElementById('book-select');
        const ratingForm = document.getElementById('rating-form');

        authorSelect.addEventListener('change', function() {
            const authorId = this.value;
            bookSelect.innerHTML = '<option value="">-- Pilih Buku --</option>';

            if (authorBooks[authorId]) {
                authorBooks[authorId].forEach(book => {
                    const option = document.createElement('option');
                    option.value = book.id;
                    option.text = book.title;
                    bookSelect.appendChild(option);
                });
            }
        });

        // Optional: Prevent submit if book not selected
        ratingForm.addEventListener('submit', function(e) {
            if (!bookSelect.value) {
                e.preventDefault();
                alert('Silakan pilih buku terlebih dahulu.');
            }
        });
    </script>
@endsection
