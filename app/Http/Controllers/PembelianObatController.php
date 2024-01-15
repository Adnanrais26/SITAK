<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\JenisObat;
use App\Models\KategoriObat;
use App\Models\Unit;
use App\Models\PembelianObat;
use Illuminate\Http\Request;

class PembelianObatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengeluarans = PembelianObat::latest()->paginate(15);
        $obats = Obat::join('jenis_obats', 'jenis_obats.id', '=', 'obats.jenisObatId')
        ->join('kategori_obats', 'kategori_obats.id', '=', 'obats.kategoriObatId')
        ->join('units', 'units.id', '=', 'obats.unitId')
        ->get(['obats.*', 'jenis_obats.jenisObat', 'kategori_obats.kategoriObat', 'units.unit']);
        
        $jeniss = JenisObat::latest()->paginate(15);
        $kategoris = KategoriObat::latest()->paginate(15);
        $units = Unit::latest()->paginate(15);

        $user_id = auth()->user()->id;
        $nama = auth()->user()->nama;

        
        return view('transaksi.pembelianObat.index',compact('pengeluarans','obats','units','kategoris','jeniss','user_id','nama'))->with('i', (request()->input('page', 1) - 1) * 5);
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
        
        $tanggalPembelian = $request->tanggalPembelian;
        // $tglPembelian = $tanggalPembelian->date('Y-m-d H:i:s');
        // $file = $request->file;
        // dd($file);
        
        $path = $request->file('file')->getRealPath();

        $logo = file_get_contents($path);
        $base64 = base64_encode($logo);
        
        $insert = $request->validate([
            'pembelianObat' => 'required',
            'jenisPembelianId' => 'required',
            'distributor' => 'required',
            'jumlah' => 'required',
            'keterangan' => 'required',
        ]);
        PembelianObat::create($insert + ['file' => $base64, 'tanggalPembelian' => $tanggalPembelian]);

        return redirect('/pembelianObat')->with('success', 'Save Succesfull!');
    }

    /**
     * Display the specified resource.
     */
    public function show(pembelianObat $pembelianObat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(pembelianObat $pembelianObat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, pembelianObat $pembelianObat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(pembelianObat $pembelianObat)
    {
        //
    }
}
