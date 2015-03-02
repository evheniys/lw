<?php namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests;
use App\Http\Requests\CategoryRequest;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Session;
# use Request;


class CategoryController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$categories = Category::all();
        return view('category.index',compact('categories'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//

        return view('category.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CategoryRequest $request)
	{
		//
        //$input = Request::all();
        //Category::create($input);
        Category::create($request->all());

        return redirect('category')->with('message','Категория добавлена');
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
	public function edit($id)
	{
		//
        $category = Category::findOrFail($id);
        return view('category.edit',compact('category'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, CategoryRequest $request)
	{
		//

        $category = Category::findOrFail($id);
        $category->update($request->all());
        return redirect('category')->withMessage('Категория обновлена');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        Category::destroy($id);
        return redirect('category')->with('message','Категория удалена');
	}

}
