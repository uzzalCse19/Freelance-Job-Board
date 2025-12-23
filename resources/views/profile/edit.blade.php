@extends('layouts.app')

@section('content')
    <h1 class="text-xl mb-4">Edit Profile</h1>
    <form method="POST" action="{{ route('profile.update') }}">
        @csrf
        @method('PATCH')
        <textarea name="bio" class="w-full border p-2" rows="6">{{ old('bio', $profile->bio ?? '') }}</textarea>
        <div class="mt-3"><button class="px-4 py-2 bg-blue-600 text-white rounded">Save</button></div>
    </form>
@endsection
