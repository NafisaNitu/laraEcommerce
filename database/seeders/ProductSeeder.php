<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\ProductImage;
use Faker\Factory;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        // for($i=1; $i< 10; $i++){
            foreach(range(1, 5) as $product){
            $product = new Product();
            $product->title = $faker->name;
            $product->description  = $faker->address;
            $product->price = rand(10,500);
            $product->quantity = rand(1,10);

            $product->slug = Str::slug($product->title);
            $product->category_id = 1;
            $product->brand_id = 1;
            $product->admin_id = 1;
            $product->save();

            $product_image = new ProductImage();
            $product_image->product_id = $product->id;
            $product_image->image = 'default.png';
            $product_image->save();
        }
    }
}
