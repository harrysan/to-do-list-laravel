<?php

namespace Database\Seeders;

use App\Models\TierTask;
use Illuminate\Database\Seeder;

class TierTaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        TierTask::factory()->times(1)->create();
    }
}
