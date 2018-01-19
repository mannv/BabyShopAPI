<?php

use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $images = ['1.jpg', '2.jpg', '3.png', '4.jpg', '5.jpg'];
        factory(\App\Entities\Banner::class, 5)->make()->each(function ($item, $index) use ($images) {
            $item->image = $images[$index];
            $item->save();
        });
    }
}
