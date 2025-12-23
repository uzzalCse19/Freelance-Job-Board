@extends('layouts.app')

@section('content')
    <h1 class="text-xl mb-4">Login</h1>

    @if($errors->any())
        <div class="mb-4 text-red-600">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ url('login') }}">
        @csrf
        <div class="mb-3">
            <label class="block mb-1">Email</label>
            <input name="email" type="email" class="w-full border p-2" required autofocus>
        </div>
        <div class="mb-3">
            <label class="block mb-1">Password</label>
            <input name="password" type="password" class="w-full border p-2" required>
        </div>
        <div class="mt-3">
            <button class="px-4 py-2 bg-blue-600 text-white rounded">Login</button>
        </div>
    </form>
@endsection
