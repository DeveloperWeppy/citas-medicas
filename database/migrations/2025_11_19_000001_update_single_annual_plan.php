<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $slug = '2c93808481aa17bd0181aaa254490087';
        $now = Carbon::now();

        $plan = DB::table('plans')->where('slug', $slug)->first();

        $payload = [
            'name' => 'Plan Anual CitasMedicas.es',
            'type_plan' => 'Anual',
            'price' => 139000,
            'duration_in_days' => 365,
            'is_group' => 0,
            'cant_people' => 1,
            'status' => 1,
            'updated_at' => $now,
        ];

        if ($plan) {
            DB::table('plans')->where('id', $plan->id)->update($payload);
        } else {
            $payload['slug'] = $slug;
            $payload['created_at'] = $now;
            DB::table('plans')->insert($payload);
        }

        DB::table('plans')
            ->where('slug', '<>', $slug)
            ->update([
                'status' => 0,
                'updated_at' => $now,
            ]);
    }

    public function down(): void
    {
        $slug = '2c93808481aa17bd0181aaa254490087';
        $now = Carbon::now();

        DB::table('plans')->where('slug', $slug)->update([
            'name' => 'Plan Individual',
            'type_plan' => 'Mensual',
            'price' => 1600,
            'duration_in_days' => 30,
            'is_group' => 0,
            'cant_people' => 1,
            'status' => 1,
            'updated_at' => $now,
        ]);

        DB::table('plans')->where('slug', '<>', $slug)->update([
            'status' => 1,
            'updated_at' => $now,
        ]);
    }
};

