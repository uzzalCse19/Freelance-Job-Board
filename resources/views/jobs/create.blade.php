@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-semibold mb-4">Post a Job</h1>

    <form method="POST" action="{{ route('jobs.store') }}" class="space-y-4">
        @csrf

        <div>
            <label class="block text-sm font-medium text-gray-700">Title</label>
            <input name="title" class="mt-1 block w-full rounded border-gray-200 shadow-sm" value="{{ old('title') }}">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Description</label>
            <textarea name="description" rows="6" class="mt-1 block w-full rounded border-gray-200 shadow-sm">{{ old('description') }}</textarea>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Budget (USD)</label>
                <input name="budget" type="number" class="mt-1 block w-full rounded border-gray-200 shadow-sm" value="{{ old('budget') }}">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Deadline</label>
                <input name="deadline" type="date" class="mt-1 block w-full rounded border-gray-200 shadow-sm" value="{{ old('deadline') }}">
            </div>
        </div>

        <div class="flex items-center gap-3">
            <button class="px-4 py-2 bg-indigo-600 text-white rounded">Post Job</button>
            <a href="{{ route('jobs.index') }}" class="text-sm text-gray-600">Cancel</a>
        </div>
    </form>
@endsection
