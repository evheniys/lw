<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model {
    protected $table = 'services';
    protected $fillable = ['title', 'logo', 'url'];

    public function category() {
        return $this->belongsToMany('App\Category')->withTimestamps();
    }

    public function getCategoriesListAttribute ()
    {
        return $this->category->lists('id');
    }
}
