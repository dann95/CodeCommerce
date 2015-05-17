<?php


use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use CodeCommerce\Product;
use CodeCommerce\Category;

use Faker\Factory as Faker;

class ProductTableSeeder extends Seeder
{
    public function run()
    {

        $categoriesId = Category::all()->lists('id');
        $faker = Faker::create('pt_BR');
        DB::table('products')->truncate();
        for($i = 1; $i <= 23; $i++)
        {
            Product::create([
                'name' => $faker->word(),
                'description' => $faker->sentence(mt_rand(1,4)),
                'price' =>  $faker->randomNumber(mt_rand(1,5)),
                'category_id' => $faker->randomElement($categoriesId),
                'featured' => mt_rand(0,1),
                'recommend' => mt_rand(0,1)
            ]);
        }


    }
}