<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(ProvincesSeeder::class);
        $this->call(RolesAndPermissionsSeeder::class);
        $this->call(CitiesSeeder::class);
    }
}
