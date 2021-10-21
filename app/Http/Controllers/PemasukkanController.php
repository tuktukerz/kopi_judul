<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
class PemasukkanController extends Controller
{
    public function index()
    {
        $orders = Order::where('status', 'finished')->latest()->get();
        return view('admin.laporan', ['orders' => $orders]);
    }
}
