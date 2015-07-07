<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

use CodeCommerce\Order;
use CodeCommerce\OrderStatus;
use Illuminate\Http\Request;

class OrdersController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Order $orderModel , OrderStatus $statusModel)
	{
        $orders = $orderModel->paginate(10);
        $status = $statusModel->lists('code_string','code');
		return view('orders.list' , compact('orders','status'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id , Order $orderModel , OrderStatus $statusModel)
	{
        $order = $orderModel->find($id);
        $status = $statusModel->lists('code_string','code');
		return view('orders.edit' , compact('order','status'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id , Order $orderModel , Request $request)
	{

        $order = $orderModel
            ->find($id)
            ->update($request->only('status'));

        return redirect()->route('orders.list');

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
