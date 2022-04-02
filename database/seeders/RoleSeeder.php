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
        $role_admin=Role::create(['name'=>'Admin']);
        $role_invitado=Role::create(['name'=>'Invitado']);
        $role_admin->givePermissionTo(Permission::all());

        // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');

        // create permissions
        Permission::create(['name'=>'admin.home', 'description' => 'Ver el dashboard'])->syncRoles([$role_admin,$role_invitado]);

        Permission::create(['name'=>'admin.users.index', 'description' => 'Ver listado de usuarios'])->syncRoles([$role_admin]);
        Permission::create(['name'=>'admin.users.edit', 'description' => 'Asignar un rol a un usuario'])->syncRoles([$role_admin]);
        Permission::create(['name'=>'admin.users.update', 'description' => 'Actualizar roles de usuario'])->syncRoles([$role_admin]);

        Permission::create(['name'=>'admin.roles.index', 'description' => 'Ver listado de Roles'])->syncRoles([$role_admin]);
        Permission::create(['name'=>'admin.roles.create', 'description' => 'Crear Roles'])->syncRoles([$role_admin]);
        Permission::create(['name'=>'admin.roles.edit', 'description' => 'Editar Roles'])->syncRoles([$role_admin]);
        Permission::create(['name'=>'admin.roles.destroy', 'description' => 'Eliminar Roles'])->syncRoles([$role_admin]);

        Permission::create(['name'=>'admin.uploads.index', 'description' => 'Ver listado de Archivos'])->syncRoles([$role_admin]);
        Permission::create(['name'=>'admin.uploads.create', 'description' => 'Subir Archivos'])->syncRoles([$role_admin]);
        Permission::create(['name'=>'admin.uploads.edit', 'description' => 'Editar archivo'])->syncRoles([$role_admin]);
        Permission::create(['name'=>'admin.uploads.destroy', 'description' => 'Eliminar File'])->syncRoles([$role_admin]);

        Permission::create(['name'=>'admin.pasos.index', 'description' => 'Ver listado de pasos'])->syncRoles([$role_admin]);
        Permission::create(['name'=>'admin.pasos.externo', 'description' => 'ver listado de externo'])->syncRoles([$role_admin]);

    }
}
