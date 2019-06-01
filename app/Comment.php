<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{

    protected $table = 'comments';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'body', 'user_id', 'user_send_id', 'likes', 'rating'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function userSend()
    {
        return $this->belongsTo('App\User', 'user_send_id');
    }

}
