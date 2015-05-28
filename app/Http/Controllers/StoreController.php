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

    public function category($id , Category $categoryModel)
    {
        $categories = $categoryModel->all();
        $category = $categoryModel->find($id);
        $categoryProducts = ($category) ? $category->products()->get() : NULL;
        return view('store.category.show' , compact('categories' , 'category', 'categoryProducts'));
    }

    public function product($id , Product $productModel , Category $categoryModel)
    {
        $product = $productModel->find($id);
        $categories = $categoryModel->all();
        return view('store.product.show' , compact('product' , 'categories'));
    }

}
