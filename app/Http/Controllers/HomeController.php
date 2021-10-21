<?php

namespace App\Http\Controllers;

use App\User;
use App\Category;
use App\Menu;
use App\Front;
use App\Order;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {        
        $jmlh_kat = Category::all()->count();
        $jmlh_menu = Menu::all()->count();
        $jmlh_user = User::all()->count();
        $jmlh_order = Order::all()->count();
        $new_orders = Order::where('status', 'new')->latest()->get();
        $confirmed_orders = Order::where('status', 'confirmed')->latest()->paginate(10);
        return view('home', [
            'jmlh_kat' => $jmlh_kat,
            'jmlh_menu' => $jmlh_menu,
            'jmlh_user' => $jmlh_user,
            'jmlh_order' => $jmlh_order,
            'new_orders' => $new_orders,
            'confirmed_orders' => $confirmed_orders,
        ]);
    }

}
