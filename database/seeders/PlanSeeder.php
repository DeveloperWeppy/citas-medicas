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
            'name' => 'Plan Anual CitasMedicas.es',
            'type_plan' => 'Anual',
            'slug' => '2c93808481aa17bd0181aaa254490087',
            'price' => 139000,
            'duration_in_days' => 365,
            'is_group' => 0,
            'cant_people' => 1,
        ]);
    }
}
