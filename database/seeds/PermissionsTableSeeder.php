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
        //Productos
        $products_permission = array(
            "products.index",
            "products.edit",
            "products.show",
            "products.create",
            "products.destroy"
        );
        $products_description = array(
            "Ver lista de productos",
            "Editar lista de productos",
            "Mostrar lista de productos",
            "Crear productos",
            "Borrar productos",

        );

        //Users
        $users_permission = array(
            "users.index",
            "users.edit",
            "users.show",
            "users.create",
            "users.destroy"
        );
        $users_description = array(
            "Ver lista de usuarios",
            "Editar lista de usuarios",
            "Mostrar lista de usuarios",
            "Crear usuarios",
            "Borrar usuarios",
        );

        //Roles
        $roles_permission = array(
            "roles.index",
            "roles.edit",
            "roles.show",
            "roles.create",
            "roles.destroy"
        );
        $roles_description = array(
            "Ver lista de roles",
            "Editar lista de roles",
            "Mostrar lista de roles",
            "Crear roles",
            "Borrar roles",
        );

        //creamos el permiso y la descripcion productos
        for ($i=0;$i<=count($products_permission)-1;$i++){
            Permission::create(['name' => $products_permission[$i]]);
            Permission::where('name', 'like','%'.$products_permission[$i].'%')
                ->update(['description' => $products_description[$i]]);
        }

        //creamos el permiso y la descripcion usuarios
        for ($i=0;$i<=count($users_permission)-1;$i++){
            Permission::create(['name' => $users_permission[$i]]);
            Permission::where('name', 'like','%'.$users_permission[$i].'%')
                ->update(['description' => $users_description[$i]]);
        }

        //creamos el permiso y la descripcion roles
        for ($i=0;$i<=count($roles_permission)-1;$i++){
            Permission::create(['name' => $roles_permission[$i]]);
            Permission::where('name', 'like','%'.$roles_permission[$i].'%')
              ->update(['description' => $roles_description[$i]]);
        }


        //Admin
        $admin = Role::create(['name' => 'SuperAdmin']);
        //Asignaos full permisos al super admin
        $admin->givePermissionTo(Permission::where('guard_name', 'web')->get());

        //Guest
        $guest = Role::create(['name' => 'Guest']);
        $guest->givePermissionTo([
            'products.index',
            'users.index',
            'users.edit',

        ]);

        //User Admin
        $user = User::find(1); //Italo Morales
        $user->assignRole('SuperAdmin');

        //User Guest
        foreach (User::where('id', '>',1)->cursor() as $guest) {
            $guest->assignRole('Guest');
        }

        //Asig tags user
        foreach (Permission::where('name', 'like','%users%')->cursor() as $tag) {
            $tag->update(['tag' => 'users']);
        }

        //Asig tags products
        foreach (Permission::where('name', 'like','%products%')->cursor() as $tag) {
            $tag->update(['tag' => 'products']);
        }

        //Asig tags roles
        foreach (Permission::where('name', 'like','%roles%')->cursor() as $tag) {
            $tag->update(['tag' => 'roles']);
        }






    }
}
