<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

use CodeCommerce\Order;
use CodeCommerce\OrderStatus;
use Illuminate\Http\Request;

class AccountController extends Controller
{

	public function index(OrderStatus $statusModel)
    {
        $status = $statusModel->all()->lists('code_string');
        return view('store.account.index' , compact('status'));
    }
    public function order($id , Order $orderModel)
    {
        $order = $orderModel->find($id);
        return view('store.account.order' , compact('order'));
    }

}
