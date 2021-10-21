<?php

namespace App;

class MenuOrder extends \Illuminate\Database\Eloquent\Relations\Pivot
{
    protected $table = 'menu_order';

    public function menu()
    {
        return $this->belongsTo('App\Menu');
    }
    public function order()
    {
        return $this->belongsTo('App\Order');
    }
}
