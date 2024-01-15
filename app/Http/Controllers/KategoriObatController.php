<?php

namespace App\Http\Controllers;

use App\Models\KategoriObat;
use Illuminate\Http\Request;

class KategoriObatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori = KategoriObat::latest()->paginate(15);
        $user_id = auth()->user()->id;
        $nama = auth()->user()->nama;

        
        return view('gudang.kategoriObat.index',compact('kategori','user_id','nama'))->with('i', (request()->input('page', 1) - 1) * 5);;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $kategori = $request->validate([
            'kategoriObat' => 'required',
            'keterangan' => 'required',
        ]);
        
        KategoriObat::create($kategori);
         
        // return redirect()->route('gudang.kategoriObat.index')
        //                 ->with('success','Product created successfully.');
        return redirect('/kategoriObat')->with('success', 'Tambah Kategori Berhasil!');
    }

    /**
     * Display the specified resource.
     */
    public function show(KategoriObat $kategoriObat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KategoriObat $kategoriObat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $kategori = $request->validate([
            'kategoriObat' => 'required',
            'keterangan' => 'required',
        ]);
        
        KategoriObat::whereId($id)->update($kategori);
        return redirect('/kategoriObat')->with('success', 'Edit Succesfull!');

    }
    public function aktif(Request $request)
    {            
        $id = $request->id;
        $active = $request->active;

        $user = KategoriObat::find($id);
        $user->active = $active;
        $user->save();
        
        if ($active == 1) {
            return redirect('/kategoriObat')->with('success', 'Kategori Obat Berhasil Diaktifkan');

        } else {
            return redirect('/kategoriObat')->with('error', 'Kategori Obat Berhasil Dinon-aktifkan');

        }

    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        KategoriObat::destroy($id);
        return redirect('/kategoriObat')->with('success', 'Kategori Obat deleted successfully!');

    }
    
}
