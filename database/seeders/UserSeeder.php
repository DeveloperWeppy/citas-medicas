<?php

namespace Database\Seeders;

use App\Models\Client;
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

        $cliente = User::create([
            'logo' => '',
            'email' => 'client@mail.com',
            'password' => bcrypt('12345678'),
            'pw_decrypte' => '12345678',
        ])->assignRole('Cliente');

        $id_client = $cliente->id;

        Client::create([
            'user_id' => $id_client,
            'name' => 'manuel',
            'last_name' => 'silva',
            'age' => '22',
            'date_of_birth' => '1999-09-25',
            'address' => 'cuberos niño',
            'neighborhood' => 'cuberos niño',
            'email' => 'client@mail.com',
            'num_phone' => '3219089590',
        ]);
    }
}
