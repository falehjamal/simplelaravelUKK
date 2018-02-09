<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    public function index()
    {
      return $this->belongsTo('App\User','id');
    }
}







