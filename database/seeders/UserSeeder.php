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
            'name' => 'Admin',
            'logo' => '',
            'email' => 'admin@citasmedicas.es',
            'password' => bcrypt('12345678'),
            'pw_decrypte' => '12345678',
        ])->assignRole('Admin');

        $cliente = User::create([
            'name' => 'manuel',
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
            'number_identication' => '1095214365',
            'type_identication' => 'C.C',
            'photo' => '/storage/clients/user.png',
            'age' => '22',
            'gender' => 'Masculino',
            'date_of_birth' => '1999-09-25',
            'address' => 'cuberos niño',
            'neighborhood' => 'cuberos niño',
            'email' => 'client@mail.com',
            'num_phone' => '3219089590',
            'is_owner' => 1,
        ]);
    }
}
