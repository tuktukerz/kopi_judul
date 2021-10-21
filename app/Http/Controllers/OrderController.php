<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Validation\ValidationException;

use App\Menu;
use App\Order;

class OrderController extends Controller
{
    public function index(){

        $orders = Order::with('menus.pivot')->get();
        return view( 'anggap-halaman-pesanan-masuk', ['orders' => $orders]);
    }

    public function store(){
        request()->validate([
            'nama_pemesan' => 'required',
            'no_meja' => 'required'
        ]);
        $carts = json_decode(Cookie::get('carts')) ?? [];
        if(count($carts) < 1){
            throw ValidationException::withMessages(['carts' => 'Isi keranjang terlebih dahulu!']);
            return;
        }
        $order = Order::create([
            'nama_pemesan' => request()->nama_pemesan,
            'no_meja' => request()->no_meja
        ]);

        Cookie::forget('carts');

        foreach($carts as $cart){
            $menu = Menu::find($cart->menu->id);
            $order->menus()->attach($menu, [
                'quantity' => $cart->quantity, 
                'request' => $cart->request]);
        }
        Cookie::queue(Cookie::forever('carts', json_encode([])));
        return redirect()->route('allmenu');
    }

    public function confirm(Order $order){
        $order->status = 'confirmed';
        $order->save();
        return back();
    }

    public function reject(Order $order){
        $order->status = 'rejected';
        $order->save();
        return back();
    }

    public function finish(Order $order){
        $order->status = 'finished';
        $order->save();
        return back();
    }

    public function show(Order $order){
        return view('admin.detail-order', ['order' => $order]);
    }
}
