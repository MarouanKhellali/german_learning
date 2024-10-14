@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h2 class="text-3xl font-bold mb-4">Level {{ $level->name }}</h2>

    <h3 class="text-2xl font-semibold mb-2">Lessons</h3>
    <ul class="list-disc pl-5 mb-4">
        @foreach($lessons as $lesson)
            <li>
                <a href="{{ route('lessons.show', [$level->id, $lesson->id]) }}" class="text-blue-500 hover:underline">
                    {{ $lesson->title }}
                </a>
            </li>
        @endforeach
    </ul>

    <a href="{{ route('tests.show', $level->id) }}" class="px-4 py-2 bg-purple-500 text-white rounded hover:bg-purple-600">
        Take Test
    </a>

    <div class="mt-4">
        <h4 class="text-xl font-semibold">Your Progress</h4>
        <p>Score: {{ $progress->current_score }}</p>
        <p>Status: {{ $progress->completed ? 'Completed' : 'In Progress' }}</p>
    </div>
</div>
@endsection
