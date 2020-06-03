<?php

use App\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name_role' => "administrador",
        ]);

        Role::create([
            'name_role' => "visualizador",
        ]);

        Role::create([
            'name_role' => "operador",
        ]);
    }
}
