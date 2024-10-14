@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h2 class="text-2xl font-bold mb-4">{{ $lesson->title }}</h2>
    <div class="prose">
        {!! nl2br(e($content['text'])) !!}
    </div>

    <a href="{{ route('quizzes.show', [$level->id, $lesson->id]) }}" class="mt-4 inline-block px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">
        Take Quiz
    </a>
</div>
@endsection
