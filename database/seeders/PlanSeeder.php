<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Plan::create([
            'name' => 'Plan Individual',
            'type_plan' => 'Mensual',
            'slug' => 'mensual',
            'price' => 5000000,
            'duration_in_days' => 30,
        ]);

        Plan::create([
            'name' => 'Plan Grupal',
            'type_plan' => 'Mensual',
            'slug' => 'anual',
            'price' => 120000000,
            'duration_in_days' => 365,
        ]);
    }
}
