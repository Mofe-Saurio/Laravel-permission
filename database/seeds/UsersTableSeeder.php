<?php
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\MorphPivot;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name' => 'Administrator']);
        Permission::create(['name' => 'crud']); //Creamos el permiso
        $role->givePermissionTo('crud'); //Asignamos el permiso al rol creado
//        $role->hasPermissionTo('destroy_notes');

        factory(App\User::class, 1)->create();
        $user = User::first();
        $user->assignRole('Administrator');


    }
}
