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

        $servdata = $request->all();

        if ($request->hasFile('logo')) {
            $allowedext = array("png", "jpg", "jpeg");
            $logof = $request->file('logo');
            $destinationPath =  'logos';
            //$filename = $logof->getClientOriginalName();
            $extension = $logof->getClientOriginalExtension();
            $filename = $servdata['title'].'_logo.'.$extension;
            if (in_array($extension, $allowedext)) {
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
        $filename = "";
        $extension = "";

        $service = Service::findOrFail($id);
        $servdata = $request->all();
        $servdata['logo'] = $service->logo;
        if ($request->hasFile('logo')) {
            $allowedext = array("png", "jpg", "jpeg");
            $logof = $request->file('logo');
            $destinationPath =  'logos';
            //$filename = $logof->getClientOriginalName();
            $extension = $logof->getClientOriginalExtension();
            $filename = $servdata['title'].'_logo.'.$extension;
            if (in_array($extension, $allowedext)) {
                if(!File::exists(public_path().'/'.$destinationPath)) {
                    if(!File::makeDirectory(public_path().'/'.$destinationPath)) {
                        abort(503);
                    }
                }
                $upload_success = $request->file('logo')->move(public_path().'/'.$destinationPath, $filename);
                $servdata['logo'] = $destinationPath.'/'.$upload_success->getFilename();
            }
        }
        $service->update($servdata);
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
        $service = Service::findOrFail($id);
        $logofile = $service->logo;
        if ($logofile != '') {
            $logofile = public_path().'/'.$logofile;
            if (File::exists($logofile))
            {
                File::delete($logofile);
            }
        }
        Service::destroy($id);
        return redirect('service')->withMessage('Сервис удален');
	}

}
