<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Const_order extends Model
{
    protected $fillable = ['const_name', 'place', 'genre', 'user_id', 'status', 'order_date'];

    public static $rules = [
        'const_name' => 'required',
        'place' => 'required',
        'genre' => 'required',
        'status' => 'required',
        'order_date' => 'date',
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }
}
