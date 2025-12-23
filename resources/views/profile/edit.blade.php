@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-semibold mb-4">Edit Profile</h1>

    <form method="POST" action="{{ route('profile.update') }}" class="space-y-4">
        @csrf
        @method('PATCH')

        <div>
            <label class="block text-sm font-medium text-gray-700">Bio</label>
            <textarea name="bio" rows="6" class="mt-1 block w-full rounded border-gray-200 shadow-sm">{{ old('bio', $profile->bio ?? '') }}</textarea>
        </div>

        <div class="flex items-center gap-3">
            <button class="px-4 py-2 bg-indigo-600 text-white rounded">Save Profile</button>
            <a href="{{ route('dashboard') }}" class="text-sm text-gray-600">Cancel</a>
        </div>
    </form>
@endsection
