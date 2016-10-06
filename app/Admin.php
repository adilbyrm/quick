<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    /**
     * database table
     */
    protected $table = 'admins';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
//    protected $fillable = [
//        'name', 'email', 'password', 'role',
//    ];

    protected $guarded = [
        'id'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
