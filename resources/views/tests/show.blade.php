@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h2 class="text-2xl font-bold mb-4">Test for Level {{ $level->name }}</h2>

    <form action="{{ route('tests.submit', $level->id) }}" method="POST">
        @csrf
        @foreach($questions as $index => $question)
            <div class="mb-4">
                <p class="font-semibold">{{ $index + 1 }}. {{ $question->question_text }}</p>
                @foreach($question->options as $key => $option)
                    <label class="block">
                        <input type="radio" name="question_{{ $question->id }}" value="{{ $key }}" required>
                        {{ $option }}
                    </label>
                @endforeach
            </div>
        @endforeach

        <button type="submit" class="px-4 py-2 bg-purple-500 text-white rounded">Submit Test</button>
    </form>
</div>
@endsection
