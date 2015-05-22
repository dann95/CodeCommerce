<?php namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name' , 'description' , 'price' , 'category_id' , 'featured' , 'recommend'];

    public function category()
    {
        return $this->belongsTo('CodeCommerce\Category');
    }
    public function images()
    {
        return $this->hasMany('CodeCommerce\ProductImage');
    }
    public function getCoverAttribute()
    {
        return $this->images()->first()->idExtension;
    }
}
