<?php namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class Order extends Model {

	protected $fillable = ['user_id' , 'price' , 'status'];

    public function items()
    {
        return $this->hasMany('CodeCommerce\OrderItem');
    }

}
