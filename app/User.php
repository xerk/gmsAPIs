<?php

namespace App;

use Laravel\Passport\HasApiTokens;
// use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, Notifiable;

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone', 'job', 'city_id', 'region_id', 'address_line_1', 'address_line_2', 'age', 'gender'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

   


    public function workers()
    {
        return $this->hasMany('App\Worker', 'user_id');
    }

    public function workerOrders()
    {
        return $this->hasMany('App\Order', 'worker_id');
    }

    public function clientOrders()
    {
        return $this->hasMany('App\Order', 'user_id');
    }

    public function city()
    {
        return $this->belongsTo('App\City', 'city_id','id');
    }

    public function region()
    {
        return $this->belongsTo('App\Region', 'region_id', 'id');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }

    public function findForPassport($username)
    {
        return $this->where('phone', $username)->orWhere('email', $username)->first();
    }
}
