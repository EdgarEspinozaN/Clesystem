<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    // seed que se ejecutaran con los comandos artisan
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(CarrerasSeeder::class);
        $this->call(RolesSeeder::class);
        $this->call(NivelesSeeder::class);
        $this->call(ConfigSeeder::class);
    }
}
