<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model {

    protected $table = 'customers';

    protected $fillable = ['name', 'phone', 'email'];

    public function reservation()
    {
        return $this->hasMany('App\Reservation');
    }
}
