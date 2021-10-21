<?php

namespace App;
use AjCastro\EagerLoadPivotRelations\EagerLoadPivotTrait;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{    
    use EagerLoadPivotTrait;
    
    protected $fillable = [
        'judul',
        'category_id',
        'harga',
        'keterangan',
        'gambar'
    ];

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function orders(){
        return $this->belongsToMany('App\Order', 'menu_order')->using('App\MenuOrder')->withPivot('quantity');
    }

    public function getPictureAttribute(){
        // $arr = explode('/', $this->gambar);
        // array_shift($arr);
        // return asset(join('/', $arr));
        return asset($this->gambar);
    }
}
