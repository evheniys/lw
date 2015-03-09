<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class ReservationRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
        return [
            'cortege' => 'required',
            'bookingdate' => 'required',
            'customerName' => 'required',
            'customerPhone' => 'required',
            'customerEmail' => 'required',
            'reservation_time_from' => 'required',
            'reservation_time_till' => 'required',
            'timetocall'=> 'required'
        ];
	}

}
