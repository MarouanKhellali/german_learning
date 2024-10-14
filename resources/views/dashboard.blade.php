@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h2 class="text-2xl font-bold mb-4">Select Your Level</h2>
    @if($levels->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @foreach($levels as $level)
                <a href="#" class="block p-6 bg-white rounded shadow hover:bg-gray-100">
                    <h3 class="text-xl font-semibold">{{ $level->name }}</h3>
                </a>
            @endforeach
        </div>
    @else
        <p>No levels available at the moment.</p>
    @endif
</div>
@endsection
