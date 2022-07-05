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
            'slug' => 'mensual individual',
            'price' => 39900,
            'duration_in_days' => 30,
            'is_group' => 0,
            'cant_people' => 1,
        ]);

        Plan::create([
            'name' => 'Plan Grupal',
            'type_plan' => 'Mensual',
            'slug' => 'mensual grupal',
            'price' => 79900,
            'duration_in_days' => 365,
            'is_group' => 1,
            'cant_people' => 4,
        ]);

        Plan::create([
            'name' => 'Plan Individual',
            'type_plan' => 'Anual',
            'slug' => 'anual individual',
            'price' => 140000,
            'duration_in_days' => 30,
            'is_group' => 0,
            'cant_people' => 1,
        ]);

        Plan::create([
            'name' => 'Plan Grupal',
            'type_plan' => 'Anual',
            'slug' => 'anual grupal',
            'price' => 280000,
            'duration_in_days' => 365,
            'is_group' => 1,
            'cant_people' => 4,
        ]);
    }
}
