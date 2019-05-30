<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    public function post()
    {
        return $this->hasOne('App\Post', 'id', 'post_id');
    }
    public function category()
    {
        return $this->hasOne('App\Category', 'id', 'category_id');
    }
}
