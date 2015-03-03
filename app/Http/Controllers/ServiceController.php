<?php namespace App\Http\Controllers;

use App\Category;
use App\Service;
use App\Http\Requests;
use App\Http\Requests\ServiceRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $services = Service::all();
        return view('service.index',compact('services'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $categories = Category::lists('title','title');
        return view('service.create',compact('categories'));

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store( ServiceRequest $request )
	{
		$service = Service::create($request->all());
        $categoriesIds = $request->input('categories');
        $service->category()->attach($categoriesIds);
        return redirect('service')->with('message','Сервис добавлен');
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
        $service = Service::findOrFail($id);
        return view('service.edit',compact('service'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, ServiceRequest $request)
	{
        $service = Service::findOrFail($id);
        $service->update($request->all());
        return redirect('service')->withMessage('Сервис обновлен');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        Service::destroy($id);
        return redirect('service')->withMessage('Сервис удален');
	}

}
