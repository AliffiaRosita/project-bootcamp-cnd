<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    protected $fillable = ['name','jenis_kelamin','alamat','user_id','image_cover'];
    protected $table = 'pengguna';

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }
}
