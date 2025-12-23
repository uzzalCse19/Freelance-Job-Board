<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureProfileIsComplete
{
    public function handle(Request $request, Closure $next)
    {
        if (! auth()->check()) {
            return $next($request);
        }

        $user = auth()->user();
        if ($user->profile?->bio === null) {
            return redirect()->route('profile.edit')
                ->with('error', 'Complete your profile first!');
        }

        return $next($request);
    }
}
