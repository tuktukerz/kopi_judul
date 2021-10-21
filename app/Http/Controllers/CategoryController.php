<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::all();
        $jmlh_ctg = Category::all()->count();
        return view('admin.category.index', compact('category','jmlh_ctg'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jmlh_ctg = Category::all()->count();
        return view('admin.category.create', compact('jmlh_ctg'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'nama' => 'required|min:3'
        ]);

        $category = Category::create([
            'nama' => $request->nama,
        ]);

        return redirect()->back()->with('success', 'Kategori Berhasil Ditambahkan');
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
        $category = Category::findorfail($id);
        return view('admin.category.edit', compact('category'));
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
           'nama' => 'required'
        ]);

        $category_data = [
            'nama' => $request->nama
        ];

        Category::whereId($id)->update($category_data);
        return redirect()->route('category.index')->with('success','Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findorfail($id);

        if(count($category->menus)){
            return redirect()->back()->with('success', 'Data Tidak Bisa Dihapus karena terelasi dengan menuu');
        }

        $category->delete();

        return redirect()->back()->with('success','Data Berhasil Dihapus');
    }
}
