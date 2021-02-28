<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    public function owner()
    {
        return $this->belongsTo('App\Owner');
    }
}
