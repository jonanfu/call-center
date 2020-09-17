<?php

use Illuminate\Database\Seeder;
use App\User;

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

        factory(App\Llamada::class, 240)->create();
    }
}
