<?php

namespace Database\Seeders;

use App\Models\AppliedJob;
use Illuminate\Database\Seeder;

class AppliedJobSeeder extends Seeder
{
    public function run(): void
    {
        AppliedJob::factory(4)->create();
    }
}
