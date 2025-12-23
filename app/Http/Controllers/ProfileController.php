<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;

class ProfileController extends Controller
{
    public function edit()
    {
        $profile = auth()->user()->profile ?? new Profile();
        return view('profile.edit', compact('profile'));
    }

    public function update(Request $request)
    {
        $user = auth()->user();
        $data = $request->validate(['bio' => 'nullable|string']);
        $user->profile()->updateOrCreate(['user_id' => $user->id], $data);
        return redirect()->route('jobs.index');
    }
}
