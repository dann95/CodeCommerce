<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

use CodeCommerce\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{

    public function add($id , Product $productModel)
    {
        $product = $productModel->find($id);
        if($product)
        {
        $cart = Session::get('cart');
        $cart->add($product);
        Session::put('cart' , $cart);
        }
        return redirect()->route('cart.list');
    }

    public function del($id)
    {
        $cart = $this->getCart()
            ->del($id);
        Session::put('cart' , $cart);
        return redirect()->route('cart.list');
    }

    public function index()
    {
        return view('store.cart.list');
    }

    private function getCart()
    {
        return Session::get('cart');
    }
}
