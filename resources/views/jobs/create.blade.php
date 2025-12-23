@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold mb-6 text-gray-800">Post a Job</h1>

    <form method="POST" action="{{ route('jobs.store') }}" class="space-y-6 bg-white p-6 rounded-lg shadow-md">
        @csrf

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Title</label>
            <input name="title" 
                   class="mt-1 block w-full rounded-lg border border-gray-300 px-3 py-2 shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" 
                   value="{{ old('title') }}">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
            <textarea name="description" rows="6" 
                      class="mt-1 block w-full rounded-lg border border-gray-300 px-3 py-2 shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">{{ old('description') }}</textarea>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Budget (USD)</label>
                <input name="budget" type="number" 
                       class="mt-1 block w-full rounded-lg border border-gray-300 px-3 py-2 shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" 
                       value="{{ old('budget') }}">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Deadline</label>
                <input name="deadline" type="date" 
                       class="mt-1 block w-full rounded-lg border border-gray-300 px-3 py-2 shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" 
                       value="{{ old('deadline') }}">
            </div>
        </div>

        <div class="flex items-center gap-3">
            <button class="px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">Post Job</button>
            <a href="{{ route('jobs.index') }}" class="text-sm text-gray-500 hover:text-gray-700 transition">Cancel</a>
        </div>
    </form>
@endsection
