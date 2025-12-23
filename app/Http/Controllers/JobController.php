<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Http\Requests\StoreJobRequest;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::latest()->get();
        return view('jobs.index', compact('jobs'));
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function store(StoreJobRequest $request)
    {
        auth()->user()->jobs()->create($request->validated());
        return redirect()->route('jobs.index');
    }

    public function highValue()
    {
        $jobs = Job::highValue()->get();
        return view('jobs.index', compact('jobs'));
    }

    // Store a comment for a given job
    public function storeComment(Request $request, Job $job)
    {
        $data = $request->validate([
            'body' => 'required|string|max:2000',
        ]);

        $job->comments()->create($data);

        return redirect()->back()->with('success', 'Comment posted.');
    }
}
