<?php

use App\Client;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //Client::truncate();

        factory(Client::class, 50)->create();

        /*for($i=1; $i<=100; $i++){
            Client::create([
                'email'    => "correo{$i}@gmail.com",
                'name'     => "Nombre Cliente {$i}",
                'birthday' => '1990-09-28',
            ]);
        }*/
    }
}
