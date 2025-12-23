@extends('layouts.app')

@section('content')
    <div class="max-w-md mx-auto">
        <h1 class="text-2xl font-semibold mb-4">Sign in to your account</h1>

        <form method="POST" action="{{ url('login') }}" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-medium text-gray-700">Email</label>
                <input name="email" type="email" class="mt-1 block w-full rounded border-gray-200 shadow-sm" required autofocus>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Password</label>
                <input name="password" type="password" class="mt-1 block w-full rounded border-gray-200 shadow-sm" required>
            </div>

            <div>
                <button class="w-full px-4 py-2 bg-indigo-600 text-white rounded">Login</button>
            </div>
        </form>
    </div>
@endsection
