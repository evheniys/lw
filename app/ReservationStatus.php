<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ReservationStatus extends Model {
    protected $table = 'reservationstatuses';

    protected $fillable = ['status'];
	//

    public function reservation()
    {
        return $this->hasMany('App\Reservation');
    }


}
