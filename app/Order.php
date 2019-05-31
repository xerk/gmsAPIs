<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{

    protected $table = 'orders';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'worker_id', 'title', 'body', 'is_done'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id')->where('job', false);
    }

    public function worker()
    {
        return $this->belongsTo('App\User', 'worker_id')->where('job', true);
    }

}
