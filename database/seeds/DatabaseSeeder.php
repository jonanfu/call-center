<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Alerta;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Jonathan Fernando',
            'lastname' => 'Narváez Urresta',
            'cedula' => '0401964515',
            'telefono' => '0982682457',
            'carrera' =>  6,
            'rol' => 1,
            'email' => 'jona@admin.com',
            'password' => bcrypt('123456'),


        ]);

        User::create([
            'name' => 'Elena Josseline',
            'lastname' => 'Roman Arcos',
            'cedula' => '1002004001',
            'telefono' => '0982682457',
            'carrera' =>  6,
            'rol' => 2,
            'email' => 'profe@admin.com',
            'password' => bcrypt('123456'),


        ]);

        User::create([
            'name' => 'Leidy Rocio',
            'lastname' => 'Figueroa Tepud',
            'cedula' => '1002003001',
            'telefono' => '0982682457',
            'carrera' =>  6,
            'rol' => 3,
            'email' => 'student@admin.com',
            'password' => bcrypt('123456'),


        ]);

     //   Alerta::create(
     //       ['tipo_alerta'=> 'Verde'],
     //       ['tipo_alerta'=> 'Amarillo'],
     //       ['tipo_alerta'=> 'Rojo']
     //   );

        factory(App\Llamada::class, 240)->create();
    }
}
