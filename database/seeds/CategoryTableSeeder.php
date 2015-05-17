<?php


use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use CodeCommerce\Category;
use Faker\Factory as Faker;

class CategoryTableSeeder extends Seeder
{
    public function run()
    {

        $faker = Faker::create('pt_BR');
        DB::table('categories')->truncate();
        for($i = 1; $i <= 23; $i++)
        {
            Category::create([
                'name' => $faker->word,
                'description' => $faker->sentence(mt_rand(2,9))
            ]);
        }


    }
}