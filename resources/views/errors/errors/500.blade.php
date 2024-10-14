@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4 text-center">
    <h1 class="text-5xl font-bold mb-4">500</h1>
    <p class="text-xl mb-4">Internal Server Error</p>
    <a href="{{ route('dashboard') }}" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Go to Dashboard</a>
</div>
@endsection
