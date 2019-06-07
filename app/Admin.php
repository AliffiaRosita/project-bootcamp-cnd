<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $fillable = ['name','jenis_kelamin','alamat','user_id','image_cover'];
    protected $table = 'admin';
}
