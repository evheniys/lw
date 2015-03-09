<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model {

    protected $table = 'reservations';

    protected $fillable = [ 'reservation_date',
                            'reservation_time_from',
                            'reservation_time_till',
                            'comment'];

    public function timetocall()
    {
        return $this->belongsTo('App\TimeToCall');
    }

    public function cortege()
    {
        return $this->belongsTo('App\Cortege');
    }

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

    public function reservationstatus()
    {
        return $this->belongsTo('App\ReservationStatus');
    }

}
