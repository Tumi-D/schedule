<?php

use Illuminate\Database\Seeder;

class LocationUsersSeedersTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\LocationUsers::class, 20)->create();
    }
}
