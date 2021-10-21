<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Cookie;
use App\Menu;
use Illuminate\Http\Request;


class CartController extends Controller
{
    public function index(){
        $carts = json_decode(Cookie::get('carts')) ?? [];
        $jmlh_carts = count($carts);

        return view('cart', ['carts' => $carts, 'jmlh_carts' => $jmlh_carts]);
    }

    public function create(Menu $menu){
        $carts = json_decode(Cookie::get('carts')) ?? [];
        $jmlh_carts = count($carts);
        return view('add', ['menu' => $menu, 'jmlh_carts' => $jmlh_carts]);
    }

    public function store(Request $request, Menu $menu){
        $request->validate([
            'quantity' => 'required|numeric|min:1',
            'request' => 'nullable|string'
        ], [
            'quantity.required' => 'Tolong isi jumlah menu yang dipesan!',
        ]);
        
        $newData = [
            'menu' => $menu,
            'quantity' => $request->quantity,
            'request' => $request->input('request') ?? '-'
        ];
        
        $carts = json_decode(Cookie::get('carts')) ?? [];

        if($carts){
            // cek apakah menu sudah ada di cart
            if(in_array($menu->id, collect($carts)->pluck('menu.id')->toArray())){
                //jika menu sudah ada di cart tambahkan quantitynya dengan quantity yang baru
                $carts[array_search($menu->id, collect($carts)->pluck('menu.id')->toArray())]->quantity += $request->quantity;
                if($request->input('request')){
                    $carts[array_search($menu->id, collect($carts)->pluck('menu.id')->toArray())]->request = $request->input('request');
                }
                Cookie::queue(Cookie::forever('carts', json_encode($carts)));
            }else{
            // jika menu belum ada di cart
                array_push($carts, $newData);
                Cookie::queue(Cookie::forever('carts', json_encode($carts)));
            }
        }else{
            // pertama kali create cart
            Cookie::queue(Cookie::forever('carts', json_encode([$newData])));
        }
        return redirect()->route('allmenu')->with('success', 'Menu berhasil di tambahkan kedalam keranjang.');
    }

    public function destroy($index){
        $carts = json_decode(Cookie::get('carts')) ?? [];
        if(count($carts)){
        unset($carts[$index]);
        Cookie::queue(Cookie::forever('carts', json_encode(array_merge([],$carts))));
        return back();
        }
    }
}
