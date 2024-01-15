<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\JenisPengeluaran;
use App\Models\KategoriObat;
use App\Models\Unit;
use App\Models\Pengeluaran;
use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $pengeluarans = Pengeluaran::latest()->paginate(15);
        // $pengeluarans = Pengeluaran::join('jenis_pengeluarans', 'jenis_pengeluarans.id', '=', 'pengeluarans.jenisPengeluaranId')
        // ->get();
        $pengeluarans = Pengeluaran::join('jenis_pengeluarans', 'jenis_pengeluarans.id', '=', 'pengeluarans.jenisPengeluaranId')
        ->get(['pengeluarans.*', 'jenis_pengeluarans.jenisPengeluaran']);

        // $obats = Obat::join('jenis_obats', 'jenis_obats.id', '=', 'obats.jenisObatId')
        // ->join('kategori_obats', 'kategori_obats.id', '=', 'obats.kategoriObatId')
        // ->join('units', 'units.id', '=', 'obats.unitId')
        // ->get(['obats.*', 'jenis_obats.jenisObat', 'kategori_obats.kategoriObat', 'units.unit']);
        
        $jeniss = JenisPengeluaran::latest()->paginate(15);
        $kategoris = KategoriObat::latest()->paginate(15);
        $units = Unit::latest()->paginate(15);

        $user_id = auth()->user()->id;
        $nama = auth()->user()->nama;

        
        return view('transaksi.pengeluaran.index',compact('pengeluarans','units','kategoris','jeniss','user_id','nama'))->with('i', (request()->input('page', 1) - 1) * 5);
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
        
        $tanggalPengeluaran = $request->tanggalPengeluaran;
        // $tglPengeluaran = $tanggalPengeluaran->date('Y-m-d H:i:s');
        // $file = $request->file;
        // dd($file);
        
        $path = $request->file('file')->getRealPath();

        $logo = file_get_contents($path);
        $base64 = base64_encode($logo);
        
        $insert = $request->validate([
            'pengeluaran' => 'required',
            'jenisPengeluaranId' => 'required',
            'distributor' => 'required',
            'jumlah' => 'required',
            'keterangan' => 'required',
        ]);
        Pengeluaran::create($insert + ['file' => $base64, 'tanggalPengeluaran' => $tanggalPengeluaran]);

        return redirect('/pengeluaran')->with('success', 'Save Succesfull!');
    }
    /**
     * Display the specified resource.
     */
    public function show(pengeluaran $pengeluaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(pengeluaran $pengeluaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $file = $request->file;
        $tanggalPengeluaran = $request->tanggalPengeluaran;
        
        
        if (empty($file)) {

            $insert = $request->validate([
                'pengeluaran' => 'required',
                'jenisPengeluaranId' => 'required',
                'distributor' => 'required',
                'jumlah' => 'required',
                'keterangan' => 'required',
            ]);
            
            Pengeluaran::whereId($id)->update($insert + ['tanggalPengeluaran' => $tanggalPengeluaran]);
            return redirect('/pengeluaran')->with('success', 'Save tanpa foto Succesfull!');
            // return redirect('/pengeluaran')->with('success', 'g pake foto!');
        } else {

            $path = $request->file('file')->getRealPath();
            $logo = file_get_contents($path);
            $base64 = base64_encode($logo);

            $insert = $request->validate([
                'pengeluaran' => 'required',
                'jenisPengeluaranId' => 'required',
                'distributor' => 'required',
                'jumlah' => 'required',
                'keterangan' => 'required',
            ]);
            
            Pengeluaran::whereId($id)->update($insert + ['file' => $base64, 'tanggalPengeluaran' => $tanggalPengeluaran]);
            return redirect('/pengeluaran')->with('success', 'Save Succesfull!');

        }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(pengeluaran $id)
    {
        Pengeluaran::destroy($id);
        return redirect('/pengeluaran')->with('success', 'Pengeluaran deleted successfully!');
    }
}
