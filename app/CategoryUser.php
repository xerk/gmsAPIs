<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryUser extends Model
{

    protected $table = 'category_user';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'category_id'
    ];

}
