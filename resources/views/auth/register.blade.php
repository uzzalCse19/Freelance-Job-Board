@extends('layouts.app')

@section('content')
<h1 class="text-xl mb-4">Register</h1>

@if($errors->any())
    <div class="mb-4 text-red-600">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ url('register') }}">
    @csrf
    <div class="mb-3">
        <label class="block mb-1">Name</label>
        <input name="name" class="w-full border p-2" value="{{ old('name') }}" required>
    </div>

    <div class="mb-3">
        <label class="block mb-1">Email</label>
        <input name="email" type="email" class="w-full border p-2" value="{{ old('email') }}" required>
    </div>

    <div class="mb-3">
        <label class="block mb-1">Password</label>
        <input name="password" type="password" class="w-full border p-2" required>
    </div>

    <div class="mb-3">
        <label class="block mb-1">Confirm Password</label>
        <input name="password_confirmation" type="password" class="w-full border p-2" required>
    </div>

    <button class="px-4 py-2 bg-green-600 text-white rounded">Register</button>
</form>

@endsection
