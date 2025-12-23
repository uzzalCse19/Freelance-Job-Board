@extends('layouts.app')

@section('content')
    <div class="flex flex-col md:flex-row items-start md:items-center justify-between mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">Jobs</h1>
            <p class="text-sm text-gray-500 mt-1">Browse available freelance work.</p>
        </div>
        <a href="{{ route('jobs.create') }}" 
           class="mt-4 md:mt-0 inline-flex items-center gap-2 px-5 py-2 rounded-lg bg-indigo-600 text-white shadow hover:bg-indigo-700 transition">
            Post Job
        </a>
    </div>

    @if($jobs->isEmpty())
        <div class="text-center py-12 text-gray-400 italic">No jobs found.</div>
    @else
        <div class="space-y-5">
            @foreach($jobs as $job)
                <article class="p-5 border border-gray-200 rounded-xl hover:shadow-lg transition bg-white">
                    <div class="flex flex-col md:flex-row items-start justify-between">
                        <div class="flex-1">
                            <h2 class="text-xl font-semibold text-gray-800">{{ $job->title }}</h2>
                            <p class="text-gray-600 mt-2">{{ \Illuminate\Support\Str::limit($job->description, 200) }}</p>
                        </div>
                        <div class="mt-4 md:mt-0 text-right flex-shrink-0">
                            <div class="text-lg font-semibold text-gray-800">${{ number_format($job->budget) }}</div>
                            <div class="text-sm text-gray-400">Deadline: {{ $job->deadline }}</div>
                            @if($job->budget > 1000)
                                <span class="inline-block mt-2 px-3 py-1 text-xs font-medium bg-yellow-100 text-yellow-800 rounded-full">High Value</span>
                            @endif
                        </div>
                    </div>
                    <div class="mt-4 text-sm text-gray-500 flex items-center gap-3 border-t pt-3">
                        <div>Posted by: <span class="font-medium text-gray-700">{{ optional($job->user)->name ?? 'Unknown' }}</span></div>
                        <div class="text-gray-300">•</div>
                        <div>{{ $job->comments->count() ?? 0 }} comments</div>
                    </div>
                </article>
            @endforeach
        </div>
    @endif
@endsection
