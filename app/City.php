<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{

    protected $table = 'cities';
    protected $primaryKey = 'id';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function regions()
    {
        return $this->hasMany('App\Region', 'city_id');
    }

}
