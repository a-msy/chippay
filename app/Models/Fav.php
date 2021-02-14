<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fav extends Model
{
    //
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    public function admin(){
        return $this->belongsTo('App\Models\Admin');
    }
    public function menu(){
        return $this->belongsTo('App\Models\Menu');
    }
}
