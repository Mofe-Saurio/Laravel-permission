<?php
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\MorphPivot;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'name'      => 'Mofe Saurio',
            'email'     => 'admin123@email.com',
            'password'     => bcrypt('password'),

        ]);

        factory(App\User::class, 10)->create();



    }
}
