<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];

    public function menus(){
        return $this->belongsToMany('App\Menu', 'menu_order')->using('App\MenuOrder')->withPivot('quantity', 'request');
    }
}
