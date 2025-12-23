@extends('layouts.app')

@section('content')
    <div class="max-w-md mx-auto mt-12 bg-white p-6 rounded-xl shadow-md">
        <h1 class="text-3xl font-bold text-gray-800 mb-2">Create your account</h1>
        <p class="text-sm text-gray-500 mb-6">Join and start posting or applying for jobs</p>

        <form method="POST" action="{{ url('register') }}" class="space-y-5">
            @csrf

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                <input name="name"
                       class="block w-full rounded-lg border border-gray-300 px-3 py-2 shadow-sm
                              focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500"
                       value="{{ old('name') }}" required>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input name="email" type="email"
                       class="block w-full rounded-lg border border-gray-300 px-3 py-2 shadow-sm
                              focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500"
                       value="{{ old('email') }}" required>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <input name="password" type="password"
                       class="block w-full rounded-lg border border-gray-300 px-3 py-2 shadow-sm
                              focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500"
                       required>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Confirm Password</label>
                <input name="password_confirmation" type="password"
                       class="block w-full rounded-lg border border-gray-300 px-3 py-2 shadow-sm
                              focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500"
                       required>
            </div>

            <div>
                <button
                    class="w-full px-4 py-2 bg-green-600 text-white font-medium rounded-lg
                           hover:bg-green-700 transition">
                    Register
                </button>
            </div>

            <p class="text-center text-sm text-gray-z500">
                Already have an account?
                <a href="{{ route('login') }}" class="text-green-600 hover:underline">Login</a>
            </p>
        </form>
    </div>
@endsection
