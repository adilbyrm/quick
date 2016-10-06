<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $table = 'regions';

    protected $guarded = ['id'];

    public function citiesOfRegion()
    {
        return $this->hasMany('App\City', 'region_id');
    }
}
