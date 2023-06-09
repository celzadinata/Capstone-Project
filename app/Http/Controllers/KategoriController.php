<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use App\Models\produk;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;


class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = kategori::paginate(10);

        return view('admin.kategori.index', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kategori.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama'=> 'required|string|min:2|max:100',
        ]);

        $data = $request->all();
        $data['nama'] = Str::title($data['nama']);

        kategori::create($data);
        return redirect()->route('kategori')->with('success', 'Berhasil Menambah Kategori');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show(kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategori = kategori::find($id);
        return view('admin.kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, kategori $id)
    {
        $request->validate([
            'nama' => 'required|string|min:2|max:100'
        ]);

        $id->update($request->all());

        return redirect()->route('kategori')->with('warning', 'Berhasil Mengupdate Kategori!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $produk = produk::where('kategoris_id',$id)->first();
        if($produk == null){
            kategori::find($id)->delete();
            alert()->error('Berhasil Menghapus Kategori');
            return redirect()->route('kategori');
            }else{
                alert()->warning( 'Tidak bisa menghapus kategori karena ada produk yang terkait');
                return redirect()->route('kategori');
            }
    }
}
