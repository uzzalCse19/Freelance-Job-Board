<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use App\Models\Job;

class JobTest extends TestCase
{
    use RefreshDatabase;

    public function test_store_job_validation()
    {
        $user = User::factory()->create();
        // Ensure profile exists and has bio so middleware allows posting
        $user->profile()->create(['bio' => 'Tester bio']);
        $this->actingAs($user);

        // Invalid budget and past deadline
        $response = $this->post(route('jobs.store'), [
            'title' => 'Test',
            'description' => 'Desc',
            'budget' => 10,
            'deadline' => now()->subDay()->toDateString(),
        ]);

        $response->assertSessionHasErrors(['budget', 'deadline']);
    }

    public function test_high_value_scope_filters_jobs()
    {
        $user = User::factory()->create();

        Job::create([
            'title' => 'Cheap',
            'description' => 'Cheap job',
            'budget' => 100,
            'deadline' => now()->addDays(5)->toDateString(),
            'user_id' => $user->id,
        ]);

        Job::create([
            'title' => 'Expensive',
            'description' => 'Big budget',
            'budget' => 5000,
            'deadline' => now()->addDays(10)->toDateString(),
            'user_id' => $user->id,
        ]);

        $high = Job::highValue()->get();
        $this->assertCount(1, $high);
        $this->assertEquals('Expensive', $high->first()->title);
    }
}
