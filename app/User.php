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

    protected $table = 'Accounts';

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
        'password', 'RememberToken',
    ];

    public function getRememberTokenName()
    {
        return 'RememberToken';
    }
}
