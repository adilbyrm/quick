<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $guarded = ['id'];

    /**
     * @param $id
     * @return mixed
     * kategorinin alt kategorisi var mi?
     */
    public static function child($id)
    {
        return Category::where('parent_id', $id)->first();
    }

    public function childrens()
    {
        return $this->hasMany('App\Category', 'parent_id');
    }

    public function parent(){
        return $this->belongsTo('App\Category', 'parent_id');
    }
}
