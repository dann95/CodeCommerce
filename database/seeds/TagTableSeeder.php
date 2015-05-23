<?php


use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use CodeCommerce\Tag;
use Faker\Factory as Faker;

class TagTableSeeder extends Seeder
{
    public function run()
    {

        $faker = Faker::create('pt_BR');
        DB::table('tags')->truncate();

        for($i = 1; $i <= 20; $i++)
        {
            Tag::create([
                'name' => $faker->word,
            ]);
        }


    }
}