<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'guard_name' => "web",
                'name' => 'Admin',
            ],
            [
                'guard_name' => 'web',
                'name' => 'SAdmin',

            ]
        ];

        foreach ($roles as $key => $values) {
            Role::create($values);
        }
    }
}
