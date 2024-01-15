<?php

namespace App\Http\Controllers;

use App\Models\JenisObat;
use Illuminate\Http\Request;

class JenisObatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jenis = JenisObat::latest()->paginate(15);
        $user_id = auth()->user()->id;
        $nama = auth()->user()->nama;

        
        return view('gudang.jenisObat.index',compact('jenis','user_id','nama'))->with('i', (request()->input('page', 1) - 1) * 5);
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
        $jenis = $request->validate([
            'jenisObat' => 'required',
            'keterangan' => 'required',
        ]);
        
        JenisObat::create($jenis);
        
        return redirect('/jenisObat')->with('success', 'Tambah Jenis Obat Berhasil!');
    }

    /**
     * Display the specified resource.
     */
    public function show(JenisObat $jenisObat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JenisObat $jenisObat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $jenis = $request->validate([
            'jenisObat' => 'required',
            'keterangan' => 'required',
        ]);
        
        JenisObat::whereId($id)->update($jenis);
        return redirect('/jenisObat')->with('success', 'Edit Succesfull!');
    }
    public function aktif(Request $request)
    {            
        $id = $request->id;
        $active = $request->active;

        $actived = JenisObat::find($id);
        $actived->active = $active;
        $actived->save();
        
        if ($active == 1) {
            return redirect('/jenisObat')->with('success', 'Kategori Obat Berhasil Diaktifkan');

        } else {
            return redirect('/jenisObat')->with('error', 'Kategori Obat Berhasil Dinon-aktifkan');

        }

    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        JenisObat::destroy($id);
        return redirect('/jenisObat')->with('success', 'Jenis Obat deleted successfully!');
    }
}
