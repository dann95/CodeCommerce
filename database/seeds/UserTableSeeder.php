<?php


use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use CodeCommerce\User;
use Faker\Factory as Faker;

class UserTableSeeder extends Seeder
{
    public function run()
    {

        $faker = Faker::create('pt_BR');
        //DB::table('users')->truncate();
        $users = User::all();

        foreach($users as $user)
        {
            $user->delete();
        }

        for($i = 1; $i <= 7; $i++)
        {
            User::create([
                'name' => $faker->firstName.' '.$faker->lastName,
                'email' => $faker->email,
                'password' => Hash::make('senha'.$i)
            ]);
        }


    }
}