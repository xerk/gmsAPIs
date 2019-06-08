<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Worker extends Model 
{

    protected $table = 'workers';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'experience', 'biography', 'price', 'files', 'category_id', 'identifier'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id')->where('job', 1);
    }

}