<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name','description','cover_image'];
    public function post()
    {
        return $this->belongsToMany('App\Post', 'post_categories', 'category_id', 'post_id');
    }
}
