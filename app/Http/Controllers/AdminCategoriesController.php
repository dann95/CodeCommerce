<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AdminCategoriesController extends Controller
{
    private $categoriesModel;

    public function __construct(Category $category)
    {
        $this->categoriesModel = $category;
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$categorias = $this->categoriesModel->all();
        return view('categories.list',compact('categorias'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('categories.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Requests\CategoryRequest $request , Category $model)
	{
        $model->fill($request->all());
        $model->save();
        return redirect()->route('categories.list');

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
	public function edit($id , Category $model)
	{
        $category = $model->find($id);
		return view('categories.edit' , compact('category'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id , Requests\CategoryUpdateRequest $request , Category $model)
	{
		$model->find($id)->update($request->all());
        return redirect()->route('categories.list');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id , Category $model)
	{
        $model->find($id)->delete();
		return redirect()->route('categories.list');
	}

}
