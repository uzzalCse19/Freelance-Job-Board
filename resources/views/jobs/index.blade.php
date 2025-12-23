@extends('layouts.app')

@section('content')
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold">Jobs</h1>
            <p class="text-sm text-gray-500">Browse available freelance work.</p>
        </div>
        <a href="{{ route('jobs.create') }}" class="inline-flex items-center gap-2 px-4 py-2 rounded bg-indigo-600 text-white shadow">Post Job</a>
    </div>

    @if($jobs->isEmpty())
        <div class="text-center py-12 text-gray-500">No jobs found.</div>
    @else
        <div class="space-y-4">
            @foreach($jobs as $job)
                <article class="p-4 border rounded-md hover:shadow transition">
                    <div class="flex items-start justify-between">
                        <div>
                            <h2 class="text-lg font-semibold">{{ $job->title }}</h2>
                            <p class="text-sm text-gray-500 mt-1">{{ \Illuminate\Support\Str::limit($job->description, 200) }}</p>
                        </div>
                        <div class="text-right">
                            <div class="text-sm font-medium">${{ number_format($job->budget) }}</div>
                            <div class="text-xs text-gray-400">Deadline: {{ $job->deadline }}</div>
                            @if($job->budget > 1000)
                                <span class="inline-block mt-2 px-2 py-0.5 text-xs bg-yellow-100 text-yellow-800 rounded">High Value</span>
                            @endif
                        </div>
                    </div>
                    <div class="mt-3 text-sm text-gray-600 flex items-center gap-4">
                        <div>Posted by: <span class="font-medium">{{ optional($job->user)->name ?? 'Unknown' }}</span></div>
                        <div class="text-gray-400">•</div>
                        <div>{{ $job->comments->count() ?? 0 }} comments</div>
                    </div>
                </article>
            @endforeach
        </div>
    @endif
@endsection
