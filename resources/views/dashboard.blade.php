@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-semibold">Dashboard</h1>
    <p class="mt-4">Welcome, {{ auth()->user()->name ?? 'Guest' }}. Use the navigation to manage jobs and profiles.</p>
@endsection
