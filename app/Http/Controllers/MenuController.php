<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Category;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $menu = Menu::all();
        $jmlh_menu = Menu::all()->count();
        return view('admin.menu.index', compact('menu','jmlh_menu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        $jmlh_menu = Menu::all()->count();
        return view('admin.menu.create',compact('category','jmlh_menu'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required',
            'category_id' => 'required',
            'harga' => 'required',
            'keterangan' => 'required',
            'gambar' => 'required'
        ]);

        $gambar = $request->gambar;
        $new_gambar = time().$gambar->getClientOriginalName();

        $post = Menu::Create([
            'judul' => $request->judul,
            'category_id' => $request->category_id,
            'harga' => $request->harga,
            'keterangan' => $request->keterangan,
            'gambar' => 'public/uploads/posts/'. $new_gambar
        ]);

        $gambar->move('public/uploads/posts', $new_gambar);
        return redirect()->route('menu.index')->with('success','Menu Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::all();
        $menu = Menu::findorfail($id);
        return view('admin.menu.edit', compact('menu','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'judul' => 'required',
            'category_id' => 'required',
            'harga' => 'required',
            'keterangan' => 'required',
        ]);

        $menu = Menu::findorfail($id);

        if($request->has('gambar')){
            $gambar = $request->gambar;
            $new_gambar = time().$gambar->getClientOriginalName();
            $gambar->move('public/uploads/posts', $new_gambar);

            $post_data = [
                'judul' => $request->judul,
                'category_id' => $request->category_id,
                'harga' => $request->harga,
                'keterangan' => $request->keterangan,
                'gambar' => 'public/uploads/posts/'. $new_gambar
            ];

        }else{
            $post_data = [
                'judul' => $request->judul,
                'category_id' => $request->category_id,
                'harga' => $request->harga,
                'keterangan' => $request->keterangan,
            ];
        }


        $menu->update($post_data);

        return redirect()->route('menu.index')->with('success','Menu Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menu = Menu::findorfail($id);

        $orders = $menu->orders;

        foreach ($orders as $order){
            $order->delete();
        }


        $menu->delete();

        return redirect()->back()->with('success','Data Berhasil Dihapus');
    }


}
