<?php

use Illuminate\Database\Seeder;

class DiscountTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('discounts')->insert(
            ['name' => '5%',
            'value' => 0.05,
            'description' => 'Lorem ipsum dolor sit amet',
            ],
            ['name' => '10%',
            'value' => 0.10,
            'description' => 'Lorem ipsum dolor sit amet',
            ]
        );

        
    }
}
