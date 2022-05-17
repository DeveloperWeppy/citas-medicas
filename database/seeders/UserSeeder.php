<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //crear usuario con rol
        User::create([
            'logo' => '',
            'email' => 'admin@citasmedicas.com',
            'password' => bcrypt('12345678'),
            'pw_decrypte' => '12345678',
        ])->assignRole('Admin');
    }
}
