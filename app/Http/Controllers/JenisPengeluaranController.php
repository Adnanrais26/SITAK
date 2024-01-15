<?php

namespace App\Http\Controllers;

use App\Models\JenisPengeluaran;
use Illuminate\Http\Request;

class JenisPengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jenis = JenisPengeluaran::latest()->paginate(15);
        $user_id = auth()->user()->id;
        $nama = auth()->user()->nama;

        
        return view('apotek.jenisPengeluaran.index',compact('jenis','user_id','nama'))->with('i', (request()->input('page', 1) - 1) * 5);
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
            'jenisPengeluaran' => 'required',
            'keterangan' => 'required',
        ]);
        
        JenisPengeluaran::create($jenis);
        
        return redirect('jenisPengeluaran')->with('success', 'Tambah Jenis Pengeluaran Berhasil!');
    }

    /**
     * Display the specified resource.
     */
    public function show(JenisPengeluaran $JenisPengeluaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JenisPengeluaran $JenisPengeluaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $jenis = $request->validate([
            'jenisPengeluaran' => 'required',
            'keterangan' => 'required',
        ]);
        
        JenisPengeluaran::whereId($id)->update($jenis);
        return redirect('/jenisPengeluaran')->with('success', 'Edit Succesfull!');
    }
    public function aktif(Request $request)
    {            
        $id = $request->id;
        $active = $request->active;

        $actived = JenisPengeluaran::find($id);
        $actived->active = $active;
        $actived->save();
        
        if ($active == 1) {
            return redirect('/jenisPengeluaran')->with('success', 'Jenis Pengeluaran Berhasil Diaktifkan');

        } else {
            return redirect('/jenisPengeluaran')->with('error', 'Jenis Pengeluaran Berhasil Dinon-aktifkan');

        }

    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        JenisPengeluaran::destroy($id);
        return redirect('/jenisPengeluaran')->with('success', 'Jenis Pengeluaran deleted successfully!');
    }
}
