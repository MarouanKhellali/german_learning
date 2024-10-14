<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Learn German</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <nav class="bg-white shadow mb-6">
        <div class="container mx-auto px-4 py-4 flex justify-between">
            <a href="{{ route('dashboard') }}" class="text-xl font-bold">Learn German</a>
            <div>
                @auth
                    <span class="mr-4">Hello, {{ Auth::user()->name }}</span>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="text-red-500 hover:underline">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="mr-4">Login</a>
                    <a href="{{ route('register') }}">Register</a>
                @endauth
            </div>
        </div>
    </nav>

    @if(session('success'))
        <div class="container mx-auto px-4 mb-4">
            <div class="bg-green-100 text-green-700 p-4 rounded">
                {{ session('success') }}
            </div>
        </div>
    @endif

    @if(session('error'))
        <div class="container mx-auto px-4 mb-4">
            <div class="bg-red-100 text-red-700 p-4 rounded">
                {{ session('error') }}
            </div>
        </div>
    @endif

    @yield('content')
</body>
</html>
