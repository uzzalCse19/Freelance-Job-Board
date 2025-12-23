@extends('layouts.app')

@section('content')
    <div class="max-w-md mx-auto">
        <h1 class="text-2xl font-semibold mb-4">Create your account</h1>

        <form method="POST" action="{{ url('register') }}" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-medium text-gray-700">Name</label>
                <input name="name" class="mt-1 block w-full rounded border-gray-200 shadow-sm" value="{{ old('name') }}" required>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Email</label>
                <input name="email" type="email" class="mt-1 block w-full rounded border-gray-200 shadow-sm" value="{{ old('email') }}" required>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Password</label>
                <input name="password" type="password" class="mt-1 block w-full rounded border-gray-200 shadow-sm" required>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Confirm Password</label>
                <input name="password_confirmation" type="password" class="mt-1 block w-full rounded border-gray-200 shadow-sm" required>
            </div>

            <div>
                <button class="w-full px-4 py-2 bg-green-600 text-white rounded">Register</button>
            </div>
        </form>
    </div>
@endsection
