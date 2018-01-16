<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(
        \App\Repositories\ProductImageRepository $productImageRepository,
        \App\Repositories\ProductRepository $productRepository,
        \App\Repositories\CategoryRepository $categoryRepository,
        Faker $faker
    ) {
        $categories = $categoryRepository->all();
        $limit = 500;
        for ($i = 0; $i < $limit; $i++) {
            $cate = $categories->random();
            $oldPrice = rand(100000, 900000);
            $productRepository->skipPresenter(true);
            $pro = $productRepository->create([
                'name' => $faker->sentence(),
                'cate_id' => $cate->id,
                'flash_sale' => rand(0, 1),
                'old_price' => $oldPrice,
                'sold' => rand(0, 100),
                'price' => $oldPrice * 0.7,
                'description' => $faker->text(500)
            ]);

            $totalImage = rand(2, 7);
            for($k = 0; $k < $totalImage; $k++) {
                $productImageRepository->create([
                    'image' => $faker->imageUrl(400, 400),
                    'product_id' => $pro->id,
                    'thumbnail' => $k == 0 ? 1 : 0
                ]);
            }
        }
    }
}
