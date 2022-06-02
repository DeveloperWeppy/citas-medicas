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
        $role2 = Role::create(['name' => 'Gestor']);
        $role3 = Role::create(['name' => 'Prestador']);
        $role4 = Role::create(['name' => 'Cliente']);

         //con el assignRole solo puedo asignar ese permiso a un solo rol
        //con el syncRoles([$1, $2, $3 , , , , ,]) puedo asignar ese permiso a más de un rol

        Permission::create(['name' => 'inicio.index'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'usuarios.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'plane.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'servicios.index'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'categorias.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'especialidades.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'intereses.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'clientes.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'servicios.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'servicios.acciones'])->syncRoles([$role1, $role2]);

        //client user permissions
        Permission::create(['name' => 'plan.index'])->assignRole($role4);
        Permission::create(['name' => 'redimidos.index'])->assignRole($role4);
        Permission::create(['name' => 'interesescliente.index'])->assignRole($role4);

        //managent of services permissions
        Permission::create(['name' => 'historialredimidos.index'])->assignRole($role3);
    }
}
