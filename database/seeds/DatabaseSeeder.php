<?php

use App\Brand;
use App\Category;
use App\Product;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(DiscountTableSeeder::class);
        $this->call(RolTableSeeder::class);
        factory(Brand::class)->times(10)->create();
        factory(Category::class)->times(15)->create();
        factory(Product::class)->times(30)->create();
        factory(User::class)->times(20)->create();
    }
}
