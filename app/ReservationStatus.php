<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ReservationStatus extends Model {
    private $table = 'reservationstatuses';

    protected $fillable = ['status'];
	//

}
