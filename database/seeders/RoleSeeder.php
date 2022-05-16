<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //https://spatie.be/docs/laravel-permission/v4/installation-laravel
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Prestador']);
        $role3 = Role::create(['name' => 'Cliente']);

         //con el assignRole solo puedo asignar ese permiso a un solo rol
        //con el syncRoles([$1, $2, $3 , , , , ,]) puedo asignar ese permiso a más de un rol

        //Permission::create(['name' => 'entradas.index'])->syncRoles([$role1, $role3]);
        //Permission::create(['name' => 'users.index'])->assignRole($role1);
    }
}
