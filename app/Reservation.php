<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model {

    protected $table = 'reservations';

    protected $fillable = [ 'reservation_date',
                            'reservation_time_from',
                            'reservation_time_till',
                            'comment'];



}
