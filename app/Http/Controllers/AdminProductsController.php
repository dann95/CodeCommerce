<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

use CodeCommerce\Product;
use Illuminate\Http\Request;


class AdminProductsController extends Controller
{
    private $productModel;
    public function __construct(Product $product)
    {
        $this->productModel = $product;
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $produtos = $this->productModel->all();
		return view('products.list' , compact('produtos'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view("products.create");
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Requests\ProductRequest $request , Product $model)
	{
        $model->create($request->all());
		return redirect()->route('products.list');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id , Product $model)
	{
        $product = $model->find($id);
		return view('products.edit' , compact('product'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id , Requests\ProductUpdateRequest $request , Product $model)
	{
		$model->find($id)->update($request->all());
        return redirect()->route('products.list');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id , Product $model)
	{
        $model->find($id)->delete();
        return redirect()->route('products.list');
	}

}
