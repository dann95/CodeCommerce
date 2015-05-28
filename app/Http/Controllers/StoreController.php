<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

use CodeCommerce\Product;
use Illuminate\Http\Request;

class StoreController extends Controller
{

    public function index(Category $categoryModel , Product $productModel)
    {
        $categories = $categoryModel->all();
        $featured = $productModel->featured();
        $recommend = $productModel->recommend();
        return view('store.index.index' , compact('categories' , 'featured' , 'recommend'));
    }

}
