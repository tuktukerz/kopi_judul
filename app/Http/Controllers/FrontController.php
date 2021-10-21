<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Cookie;


use App\Front;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(){
        $carts = json_decode(Cookie::get('carts')) ?? [];
        $jmlh_carts = count($carts);
        return view('fr', ['jmlh_carts' => $jmlh_carts]);
    }

    public function allmenu(){
        $makanan = Front::where('category_id', 1)->get();
        $minuman = Front::where('category_id', 2)->get();
        $snack = Front::where('category_id', 3)->get();
        $carts = json_decode(Cookie::get('carts')) ?? [];
        $jmlh_carts = count($carts);
        
        return view('allmenu', [
            'makanan' => $makanan,
            'minuman' => $minuman,
            'snack' => $snack,
            'jmlh_carts' => $jmlh_carts
        ]);
    }
}
