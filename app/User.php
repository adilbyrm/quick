<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
   // protected $fillable = [];

    const CREATED_AT = 'RowAddDateTime';

    const UPDATED_AT = 'RowEditDateTime';

    protected $table = 'CurrentAccounts';

    protected $primaryKey = 'RowID';

    protected $guarded = [
        'RowID'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'Password', 'RememberToken',
    ];

    public function getRememberTokenName()
    {
        return 'RememberToken';
    }

    /**
     * accessor for the UserName field
     */
    public function getUserNameAttribute($value)
    {
        // return ucwords($value);
    }

    /**
     * mutator the UserName field
     */
    public function setUserNameAttribute($value)
    {
        // $this->attributes['UserName'] = ucwords($value);
    }
}
