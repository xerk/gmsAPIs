<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Timetable extends Model 
{

    protected $table = 'timetables';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];

}