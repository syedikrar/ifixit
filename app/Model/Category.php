<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = ['title'];

    public function children()
    {
        return $this->hasMany('App\Model\Category','parent_id');
    }

}
