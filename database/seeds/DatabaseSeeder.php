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
            'name' => 'Jonathan Narvaez',
            'email' => 'jona@admin.com',
            'password' => bcrypt('123456')
        ]);

     //   Alerta::create(
     //       ['tipo_alerta'=> 'Verde'],
     //       ['tipo_alerta'=> 'Amarillo'],
     //       ['tipo_alerta'=> 'Rojo']
     //   );

        factory(App\Llamada::class, 240)->create();
    }
}
