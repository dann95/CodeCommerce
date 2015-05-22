<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

use CodeCommerce\Product;
use CodeCommerce\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


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
        $produtos = $this->productModel->paginate(10);
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
        $produto = $model->find($id);
        foreach($produto->images()->get() as $imgDel)
        {
            file_exists(public_path().'/images/products/'.$imgDel->idExtension) && Storage::disk('productImages')->delete($imgDel->idExtension);
        }
        $produto->delete();
        return redirect()->route('products.list');
	}
    public function images($id , Product $product)
    {
        $product = $product->find($id);
        return view('products.images' , compact('product'));
    }
    public function imageStore($id , Request $request , ProductImage $productImage)
    {
        $file = $request->file('image');
        $ext = $file->getClientOriginalExtension();
        $img = $productImage->create(['product_id' => $id , 'extension' => $ext]);
        Storage::disk('productImages')->put($img->idExtension , File::get($file));
        return redirect()->route('products.images' , ['id' => $id]);
    }

    public function destroyImage($id , ProductImage $productImage)
    {
        $img = $productImage->find($id);
        $productId = $img->product->id;
        if(file_exists(public_path().'/images/products/'.$img->idExtension))
        {
            Storage::disk('productImages')->delete($img->idExtension);
        }
        $img->delete();
        return redirect()->route('products.images' , ['id' => $productId]);
    }
}
