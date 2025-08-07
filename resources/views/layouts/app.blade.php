<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookstore App</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <header class="bg-white shadow-md sticky top-0 z-50">
        <div class="container mx-auto px-6 py-4 flex flex-col md:flex-row md:items-center md:justify-between">
            <h1 class="text-3xl font-bold text-gray-800">📚 Bookstore App</h1>
            <nav class="mt-4 md:mt-0">
                <ul class="flex space-x-4 text-lg">
                    <li>
                        <a href="{{ route('books.index') }}"
                            class="@if (request()->routeIs('books.index')) text-blue-600 font-semibold @else text-gray-600 hover:text-blue-500 @endif transition duration-200">Daftar
                            Buku</a>
                    </li>
                    <li>
                        <a href="{{ route('authors.index') }}"
                            class="@if (request()->routeIs('authors.index')) text-blue-600 font-semibold @else text-gray-600 hover:text-blue-500 @endif transition duration-200">Top
                            10 Penulis</a>
                    </li>
                    <li>
                        <a href="{{ route('ratings.create') }}"
                            class="@if (request()->routeIs('ratings.create')) text-blue-600 font-semibold @else text-gray-600 hover:text-blue-500 @endif transition duration-200">Tambah
                            Rating</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <main class="container mx-auto px-6 py-8">
        @if (session('success'))
            <div class="mb-6 p-4 bg-green-100 text-green-800 rounded-md">
                {{ session('success') }}
            </div>
        @endif

        <hr class="my-4">
        <div class="bg-white rounded-lg shadow p-6">
            @yield('content')
        </div>
    </main>

    <footer class="bg-white shadow-inner mt-8">
        <div class="container mx-auto px-6 py-4 text-center text-sm text-gray-500">
            <p>© {{ date('Y') }} Bookstore App. All rights reserved.</p>
        </div>
    </footer>
</body>

</html>
