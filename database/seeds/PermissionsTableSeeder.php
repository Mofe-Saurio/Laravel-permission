<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\User;
class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //products
        Permission::create(['name' => 'products.index']);
        Permission::create(['name' => 'products.edit']);
        Permission::create(['name' => 'products.show']);
        Permission::create(['name' => 'products.create']);
        Permission::create(['name' => 'products.destroy']);

        //Users
        Permission::create(['name' => 'users.index']);
        Permission::create(['name' => 'users.edit']);
        Permission::create(['name' => 'users.show']);
        Permission::create(['name' => 'users.create']);
        Permission::create(['name' => 'users.destroy']);
        //Roles
        Permission::create(['name' => 'roles.index']);
        Permission::create(['name' => 'roles.edit']);
        Permission::create(['name' => 'roles.show']);
        Permission::create(['name' => 'roles.create']);
        Permission::create(['name' => 'roles.destroy']);

        //Admin
        $admin = Role::create(['name' => 'SuperAdmin']);
        //Asignaos full permisos al super admin
        $admin->givePermissionTo(Permission::where('guard_name', 'web')->get());

        //Guest
        $guest = Role::create(['name' => 'Guest']);
        $guest->givePermissionTo([
            'products.index',
        ]);

        //User Admin
        $user = User::find(1); //Italo Morales
        $user->assignRole('SuperAdmin');

        //User Guest
        foreach (User::where('id', '>',1)->cursor() as $guest) {
            $guest->assignRole('Guest');
        }



    }
}
