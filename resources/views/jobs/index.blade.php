@extends('layouts.app')

@section('content')
    <div class="flex flex-col md:flex-row items-start md:items-center justify-between mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">Jobs</h1>
            <p class="text-sm text-gray-500 mt-1">Browse available freelance work.</p>
        </div>
        <a href="{{ route('jobs.create') }}"
           class="mt-4 md:mt-0 inline-flex items-center px-5 py-2 rounded-lg bg-indigo-600 text-white shadow hover:bg-indigo-700 transition">
            Post Job
        </a>
    </div>

    @if($jobs->isEmpty())
        <div class="text-center py-12 text-gray-400 italic">No jobs found.</div>
    @else
        <div class="space-y-6">
            @foreach($jobs as $job)
                <article class="p-6 bg-white border border-gray-200 rounded-xl hover:shadow-lg transition">
                    <div class="flex flex-col md:flex-row justify-between gap-4">
                        <div class="flex-1">
                            <h2 class="text-xl font-semibold text-gray-800">
                                {{ $job->title }}
                            </h2>
                            <p class="text-gray-600 mt-2">
                                {{ \Illuminate\Support\Str::limit($job->description, 200) }}
                            </p>
                        </div>

                        <div class="text-right min-w-[140px]">
                            <div class="text-lg font-semibold text-gray-800">
                                ${{ number_format($job->budget) }}
                            </div>
                            <div class="text-sm text-gray-400">
                                Deadline: {{ $job->deadline }}
                            </div>

                            @if($job->budget > 1000)
                                <span class="inline-block mt-2 px-3 py-1 text-xs font-medium bg-yellow-100 text-yellow-800 rounded-full">
                                    High Value
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="mt-5 flex items-center gap-4 text-sm text-gray-500 border-t pt-4">
                        <span>
                            Posted by
                            <span class="font-medium text-gray-700">
                                {{ optional($job->user)->name ?? 'Unknown' }}
                            </span>
                        </span>
                        <span class="text-gray-300">•</span>
                        <span>{{ $job->comments->count() ?? 0 }} comments</span>

                        <button type="button"
                                class="see-comments ml-auto px-3 py-1 rounded-md bg-gray-100 text-gray-700 hover:bg-gray-200 transition"
                                data-target="comments-{{ $job->id }}">
                            See Comments
                        </button>
                    </div>

                    <div id="comments-{{ $job->id }}" class="hidden mt-4 border-t pt-4 space-y-3">
                        @forelse($job->comments as $comment)
                            <div class="bg-gray-50 p-3 rounded-md text-sm">
                                <p class="text-gray-700">{{ $comment->body }}</p>
                                <p class="text-xs text-gray-400 mt-1">
                                    {{ $comment->created_at->diffForHumans() }}
                                </p>
                            </div>
                        @empty
                            <p class="text-sm text-gray-500">No comments yet.</p>
                        @endforelse

                        @auth
                            <form method="POST" action="{{ route('jobs.comments.store', $job) }}" class="pt-3">
                                @csrf
                                <textarea name="body" rows="2"
                                          class="w-full rounded-lg border-gray-300 focus:ring-indigo-500 focus:border-indigo-500"
                                          placeholder="Add a comment..."></textarea>

                                <div class="text-right mt-2">
                                    <button class="px-4 py-1.5 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">
                                        Comment
                                    </button>
                                </div>
                            </form>
                        @else
                            <p class="text-sm text-gray-500">
                                Please <a href="{{ route('login') }}" class="text-indigo-600 hover:underline">login</a> to comment.
                            </p>
                        @endauth
                    </div>
                </article>
            @endforeach
        </div>
    @endif

    <script>
        document.querySelectorAll('.see-comments').forEach(btn => {
            btn.addEventListener('click', () => {
                const el = document.getElementById(btn.dataset.target);
                if (!el) return;

                el.classList.toggle('hidden');
                btn.textContent = el.classList.contains('hidden')
                    ? 'See Comments'
                    : 'Hide Comments';
            });
        });
    </script>
@endsection
