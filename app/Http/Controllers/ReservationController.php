<?php namespace App\Http\Controllers;

use App\Cortege;
use App\Http\Requests;
use App\Http\Requests\ReservationRequest;
use App\Http\Controllers\Controller;
use App\Reservation;
use App\ReservationStatus;
use App\TimeToCall;
use Illuminate\Http\Request;

class ReservationController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
        $reservations = Reservation::all();
        return view('reservations.index',compact('reservations'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
        $statuses = ReservationStatus::first();
        $timetocalles = TimeToCall::lists('timeinterval','id');
        $corteges = Cortege::all(['cortegename','cortegepic','id']);
        //print_r(compact('statuses','timetocalles','corteges'));
        //dd(compact('statuses','timetocalles','corteges'));
        return view('reservation.create', compact('statuses','timetocalles','corteges'));

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store( ReservationRequest $request )
	{
        //return Response::json(['blah' => 'ohhh']);
        $reservdata = $request->all();
        dd($reservdata);
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
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
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
