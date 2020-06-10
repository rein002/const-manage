<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Const_order extends Model
{
    public function user() {
        return $this->belongsTo('App\User');
    }
}
