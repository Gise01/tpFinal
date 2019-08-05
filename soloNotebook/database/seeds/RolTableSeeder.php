<?php

use Illuminate\Database\Seeder;

class RolTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert(
            ['name' => 'Admin',
            'description' => 'Lorem ipsum dolor sit amet',
            ],
            ['name' => 'User',
            'description' => 'Lorem ipsum dolor sit amet',
            ]
        );
    }
}
