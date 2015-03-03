<?php namespace App\Http\Controllers;

use App\Category;
use App\Service;
use App\Http\Requests;
use App\Http\Requests\ServiceRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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
        $categories = Category::lists('title','id');
        return view('service.create',compact('categories'));

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store( ServiceRequest $request )
	{
        $filename = "";
        $extension = "";

        if ($request->hasFile('logo')) {
            $allowedext = array("png", "jpg", "jpeg");
            $logof = $request->file('logo');
            $destinationPath =  'logos';
            $filename = $logof->getClientOriginalName();
            $extension = $logof->getClientOriginalExtension();
            if (in_array($extension, $allowedext)) {
                $servdata = $request->all();
                if(!File::exists(public_path().'/'.$destinationPath)) {
                    if(!File::makeDirectory(public_path().'/'.$destinationPath)) {
                        abort(503);
                    }
                }
                $upload_success = $request->file('logo')->move(public_path().'/'.$destinationPath, $filename);
                $servdata['logo'] = $destinationPath.'/'.$upload_success->getFilename();
            }
        }
        $service = Service::create($servdata);
        $categoriesIds = $request->input('categories_list');
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
        $service = Service::findOrFail($id);
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
        $categories = Category::lists('title','id');
        return view('service.edit',compact('service','categories'));
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

        $categoriesIds = $request->input('categories_list');
        $service->category()->sync($categoriesIds);

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
