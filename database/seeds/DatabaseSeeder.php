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
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(LocationSeeder::class);
        $this->call(TeamSeeder::class);

        // $this->call(LocationUsersSeedersTable::class);
    }
}
