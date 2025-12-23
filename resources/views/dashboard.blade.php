@extends('layouts.app')

@section('content')
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-semibold">Dashboard</h1>
            <p class="text-sm text-gray-500">Welcome back, {{ auth()->user()->name ?? 'Guest' }}.</p>
        </div>
        <a href="{{ route('jobs.create') }}" class="px-3 py-2 bg-indigo-600 text-white rounded">Post a Job</a>
    </div>

    <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="bg-white p-4 rounded shadow">
            <h3 class="font-semibold">Your Jobs</h3>
            <p class="text-sm text-gray-500 mt-2">Manage and review your posted jobs.</p>
        </div>
        <div class="bg-white p-4 rounded shadow">
            <h3 class="font-semibold">Profile</h3>
            <p class="text-sm text-gray-500 mt-2">Edit your profile to increase trust with clients.</p>
        </div>
    </div>
@endsection
