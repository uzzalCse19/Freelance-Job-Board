<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Profile;
use App\Models\Job;
use App\Models\Comment;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create a user with completed profile
        $user = User::create([
            'name' => 'Alice',
            'email' => 'alice@example.test',
            'password' => Hash::make('password'),
        ]);

        Profile::create([
            'user_id' => $user->id,
            'bio' => 'Experienced developer available for freelance work.'
        ]);

        // Create some jobs
        Job::create([
            'title' => 'Build a REST API',
            'description' => 'Create a RESTful API using Laravel.',
            'budget' => 1500,
            'deadline' => now()->addDays(14)->toDateString(),
            'user_id' => $user->id,
        ]);

        Job::create([
            'title' => 'Small Website',
            'description' => 'Static marketing website.',
            'budget' => 300,
            'deadline' => now()->addDays(7)->toDateString(),
            'user_id' => $user->id,
        ]);

        // Comment on profile
        Comment::create([
            'body' => 'Nice profile!',
            'commentable_type' => Profile::class,
            'commentable_id' => $user->profile->id,
        ]);

        // Comment on job
        $job = Job::first();
        Comment::create([
            'body' => 'Is this still available?',
            'commentable_type' => Job::class,
            'commentable_id' => $job->id,
        ]);
    }
}

