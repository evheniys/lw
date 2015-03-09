<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Cortege extends Model {

    protected $table = 'corteges';

    protected $fillable = ['cortegename', 'cortegepic'];

    public function reservation()
    {
        return $this->hasMany('App\Reservation');
    }

}
