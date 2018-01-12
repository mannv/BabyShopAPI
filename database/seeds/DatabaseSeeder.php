<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(BannerSeeder::class);
         $this->call(CategorySeeder::class);
         $this->call(ProductSeeder::class);
    }
}
