<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        $jmlh_user = User::all()->count();
        return view('admin.user.index', compact('user','jmlh_user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jmlh_user = User::all()->count();
        return view('admin.user.create', compact('jmlh_user'));
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
            'name' => 'required|min:3|max:100',
            'email' => 'required|email',
        ]);

        if($request->input('password')){
            $password = bcrypt($request->password);

        }else{
            $password = bcrypt('12345');
        }

        User::Create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $password
        ]);

        return redirect()->back()->with('success','Admin Berhasil Ditambahkan');
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
        $user = User::find($id);
        return view('admin.user.edit', compact('user'));
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
            'name' => 'required|min:3|max:100',
        ]);

        if($request->input('password')){
           $user_data = [
               'name' => $request->name,
               'password' => bcrypt($request->password)
           ];
        }else{
            $user_data = [
                'name' => $request->name
            ];
        }

        $user = User::find($id);
        $user->update($user_data);

        return redirect()->route('user.index')->with('success','Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        $user->delete();
        return redirect()->back()->with('success','Berhasil Dihapus');
    }
}
