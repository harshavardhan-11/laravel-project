<?php

namespace Database\Factories;

use App\Models\AppliedJob;
use App\Models\Job;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class AppliedJobFactory extends Factory
{
    protected $model = AppliedJob::class;

    public function definition(): array
    {
        return [
            'job_listing_id' => Job::factory(),
            'user_id' => User::factory(),
            'remarks' => $this->faker->word(),
            'is_active' => $this->faker->boolean(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
