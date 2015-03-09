<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class TimeToCall extends Model {
    protected $table = 'timetocalls';
    protected $fillable = ['timeinterval'];

	//
    public function reservation()
    {
        return $this->hasMany('App\Reservation');
    }

}
