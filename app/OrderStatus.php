<?php namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model {

	//
    protected $table = 'order_status';
    protected $fillable = ['code' , 'code_string'];
}
