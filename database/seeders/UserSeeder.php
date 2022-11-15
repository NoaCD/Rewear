<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name' => 'admin']);

        User::create([
            'name' => 'Alfredo Gonzalez Marenco',
            'email' => 'marencocode@gmail.com',
            'password' => bcrypt('password'),
        ])->assignRole($role);

        User::create([
            'name' => 'Alvar Buenfil',
            'email' => 'ab@agenciavandu.com',
            'password' => bcrypt('password'),
        ])->assignRole($role);

        User::factory(100)->create();
    }
}
