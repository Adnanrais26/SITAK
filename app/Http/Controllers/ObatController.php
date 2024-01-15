<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\JenisObat;
use App\Models\KategoriObat;
use App\Models\Unit;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $obats = Obat::join('jenis_obats', 'jenis_obats.id', '=', 'obats.jenisObatId')
        ->join('kategori_obats', 'kategori_obats.id', '=', 'obats.kategoriObatId')
        ->join('units', 'units.id', '=', 'obats.unitId')
        ->get(['obats.*', 'jenis_obats.jenisObat', 'kategori_obats.kategoriObat', 'units.unit']);
        
        $jeniss = JenisObat::latest()->paginate(15);
        $kategoris = KategoriObat::latest()->paginate(15);
        $units = Unit::latest()->paginate(15);

        $user_id = auth()->user()->id;
        $nama = auth()->user()->nama;

        
        return view('gudang.obat.index',compact('obats','units','kategoris','jeniss','user_id','nama'))->with('i', (request()->input('page', 1) - 1) * 5);
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
        // $hargaBeli = $request->hargaBeli;
        // $hargaJual = $hargaBeli * 30 / 100 + $hargaBeli;
        $obat = $request->validate([
            'kodeProduk' => 'required',
            'obat' => 'required',
            'kategoriObatId' => 'required',
            'jenisObatId' => 'required',
            'unitId' => 'required',
            'jumlah' => 'required',
            'hargaBeli' => 'required',
            'hargaJual' => 'required',
            'keterangan' => 'required',
        ]);
        
        Obat::create($obat);
        
        return redirect('/obat')->with('success', 'Tambah Obat Berhasil!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Obat $obat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Obat $obat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // $hargaBeli = $request->hargaBeli;
        // $hargaJual = $hargaBeli * 30 / 100 + $hargaBeli;
        $obat = $request->validate([
            'kodeProduk' => 'required',
            'obat' => 'required',
            'kategoriObatId' => 'required',
            'jenisObatId' => 'required',
            'unitId' => 'required',
            'jumlah' => 'required',
            'hargaBeli' => 'required',
            'hargaJual' => 'required',
            'keterangan' => 'required',
        ]);
        Obat::whereId($id)->update($obat);
        return redirect('/obat')->with('success', 'Edit Obat Berhasil!');
        
    }
    public function aktif(Request $request)
    {            
        $id = $request->id;
        $active = $request->active;

        $obat = Obat::find($id);
        $obat->active = $active;
        $obat->save();
        
        if ($active == 1) {
            return redirect('/obat')->with('success', 'Obat Berhasil Diaktifkan');

        } else {
            return redirect('/obat')->with('error', 'Obat Berhasil Dinon-aktifkan');

        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Obat::destroy($id);
        return redirect('/obat')->with('success', 'Obat deleted successfully!');
    }
}
