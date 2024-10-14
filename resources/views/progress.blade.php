@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h2 class="text-2xl font-bold mb-4">Your Progress</h2>
    <table class="min-w-full bg-white">
        <thead>
            <tr>
                <th class="py-2">Level</th>
                <th class="py-2">Score</th>
                <th class="py-2">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($progress as $p)
                <tr class="text-center">
                    <td class="py-2">{{ $p->level->name }}</td>
                    <td class="py-2">{{ $p->current_score }}</td>
                    <td class="py-2">{{ $p->completed ? 'Completed' : 'In Progress' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
