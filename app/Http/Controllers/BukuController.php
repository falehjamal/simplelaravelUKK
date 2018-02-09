<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Buku;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $url = 'buku';
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('Admin');
        // $this->middleware('Verify');
    }
    // private $no = 1;
    
    public function index()
    {
        $url  = $this->url;
        $no = 1;
        $data = Buku::paginate(3);
        // $data = Buku::findOrFail($id);
        return view($this->url.'/index',compact('data','no'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $url = $this->url;
        return view($this->url.'/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->file('foto') != null) {
            # code...
        $file = $request->file('foto');
        $name = 'larabuku'.rand().'.'.$file->getClientOriginalExtension();
        $file->move(public_path('uploads'), $name);
        }

        $buku = new Buku;
        $buku->buku = $request->buku;
        if ($request->file('foto') != null) {
        $buku->photo = $name;
        }
        $buku->save();

        return redirect('buku')->with('status','Data Berhasil ditambahkan');
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
        $data = Buku::find($id);
        return view('buku/edit',compact('data','id'));
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
        if ($request->file('foto') != null){
        $file = $request->file('foto');
        $name = rand().'.'.$file->getClientOriginalExtension();
        $file->move(public_path('uploads'), $name);
        }

        $buku = Buku::find($id);
        $buku->buku = $request->buku;
        if ($request->file('foto') != null){
        $buku->photo = $name;
        }
        $buku->save();

        return redirect('buku')->with('status','Data Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Buku::find($id)->delete();
        return redirect('buku');
    }
    
}
