<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $url = 'admin';

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('User');
        // $this->middleware('Verify');
    }
    public function index()
    {
        $url  = $this->url;
        $no = 1;
        $data = User::where('level', '!=' , 1)->paginate(5);
        $jumlah = User::where('level', '!=' , 1)->get();

        return view($this->url.'.index',compact('data','no','jumlah','url'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        // $url  = $this->url;
        $data = User::find($id);
        return view($this->url.'.edit',compact('data','id'));
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
        $buku = User::find($id);
        $buku->status = $request->status;
        $buku->save();

        return redirect($this->url)->with('status','Data Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect($this->url)->with('status','Data Berhasil dihapus');
    }
}
