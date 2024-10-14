<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Learn German</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="text-center">
        <h1 class="text-5xl font-bold mb-4">Welcome to Learn German</h1>
        <div class="space-x-4">
            <a href="{{ route('login') }}" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Login</a>
            <a href="{{ route('register') }}" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">Sign Up</a>
        </div>
    </div>
</body>
</html>
