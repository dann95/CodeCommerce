<?php


use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use CodeCommerce\OrderStatus;



class OrderStatusTableSeeder extends Seeder
{
    public function run()
    {

        DB::table('order_status')->truncate();


        OrderStatus::create([
            'code' => 0 ,
            'code_string' => 'cancelado'
        ]);

        OrderStatus::create([
            'code' => 1 ,
            'code_string' => 'recebido'
        ]);

        OrderStatus::create([
            'code' => 2 ,
            'code_string' => 'processando'
        ]);

        OrderStatus::create([
            'code' => 3 ,
            'code_string' => 'aprovado'
        ]);
    }
}