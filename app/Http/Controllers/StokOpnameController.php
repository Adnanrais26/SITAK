<?php

namespace App\Http\Controllers;

use App\Models\StokOpname;
use App\Models\Obat;
use App\Models\JenisObat;
use App\Models\KategoriObat;
use App\Models\Unit;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class StokOpnameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tahun = date('Y');
        $bulan = date('F');
        $bulanAngka = date('m');
       
        $obats = Obat::join('jenis_obats', 'jenis_obats.id', '=', 'obats.jenisObatId')
        ->join('kategori_obats', 'kategori_obats.id', '=', 'obats.kategoriObatId')
        ->join('units', 'units.id', '=', 'obats.unitId')
        ->leftJoin('stok_opnames', 'stok_opnames.obatId', '=', 'obats.id')
        ->where('obats.active', 1)
        ->whereYear('obats.updated_at', '=', $tahun)
        // ->whereMonth('obats.updated_at', '=', $bulanAngka)
        // ->orderBy('jumlahSebenarnya', 'DESC')
        // ->groupBy('obatObatId')
        ->get(['obats.id as obatObatId','obats.obat','obats.kodeProduk as ObatKodeProduk',
        'obats.unitId as ObatUnitId','obats.jumlah','obats.active','obats.hargaBeli',
        'obats.hargaJual as ObatHargaJual', 'jenis_obats.jenisObat', 
        'kategori_obats.kategoriObat', 'units.unit', 
        'stok_opnames.id as stokId','stok_opnames.userId', 'stok_opnames.obatId', 'stok_opnames.kodeProduk', 'stok_opnames.unitId', 
        'stok_opnames.jumlahTercatat', 'stok_opnames.jumlahSebenarnya', 'stok_opnames.keterangan', 
        'stok_opnames.created_at', 'stok_opnames.updated_at', ]);
        // ->get(['obats.*', 'jenis_obats.jenisObat', 'kategori_obats.kategoriObat', 'units.unit', 'stok_opnames.*']);
        // $obats2 = StokOpname::select('*');

        

        $jeniss = JenisObat::latest()->paginate(15);
        $kategoris = KategoriObat::latest()->paginate(15);
        $units = Unit::latest()->paginate(15);

        $user_id = auth()->user()->id;
        $nama = auth()->user()->nama;

        
        return view('stokOpname.index',compact('bulan', 'tahun','obats','units','kategoris','jeniss','user_id','nama'))->with('i', (request()->input('page', 1) - 1) * 5);
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
        $obat2 = $request->validate([
            'userId' => 'required',
            'obatId' => 'required',
            'kodeProduk' => 'required',
            'unitId' => 'required',
            'jumlahTercatat' => 'required',
            'jumlahSebenarnya' => 'required',
            'keterangan' => 'required',
        ]);
        
        StokOpname::create($obat2);


        $obatId = $request->obatId;
        $jumlah = $request->jumlahSebenarnya;

        Obat::where('id', $obatId)->update(array('jumlah' => $jumlah));

        
        return redirect('/stokOpname')->with('success', 'Tambah Stok Opname Berhasil!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Obat $obat, $id)
    {
        $tahun = date('Y');
        $bulan = date('F');
        $bulanAngka = date('m');

        $user_id = auth()->user()->id;
        $nama = auth()->user()->nama;

        $obatsStok = StokOpname::join('users', 'users.id', '=', 'stok_opnames.userId')
        ->join('obats', 'obats.id', '=', 'stok_opnames.obatId')
        ->join('units', 'units.id', '=', 'stok_opnames.unitId')
        ->where('obats.active', 1)
        ->where('obats.id', $id)
        ->whereYear('obats.updated_at', '=', $tahun)
        // ->whereMonth('obats.updated_at', '=', $bulanAngka)
        ->orderBy('created_at', 'DESC')
        // ->groupBy('obatObatId')
        ->get(['obats.id as obatObatId','obats.obat','obats.kodeProduk as ObatKodeProduk',
        'obats.unitId as ObatUnitId','obats.jumlah','obats.active','obats.hargaBeli',
        'obats.hargaJual as ObatHargaJual', 
        'units.unit', 
        'stok_opnames.id as stokId','stok_opnames.userId', 'stok_opnames.obatId', 'stok_opnames.kodeProduk', 'stok_opnames.unitId', 
        'stok_opnames.jumlahTercatat', 'stok_opnames.jumlahSebenarnya', 'stok_opnames.keterangan', 
        'stok_opnames.created_at', 'stok_opnames.updated_at', 'users.nama']);

        return view('stokOpname.result',compact('obatsStok','bulan', 'tahun','user_id','nama'))->with('i', (request()->input('page', 1) - 1) * 5);

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
        
        $validate = $request->validate([
            'userId' => 'required',
            'obatId' => 'required',
            'kodeProduk' => 'required',
            'unitId' => 'required',
            'jumlahTercatat' => 'required',
            'jumlahSebenarnya' => 'required',
            'keterangan' => 'required',
        ]);
        StokOpname::whereId($id)->update($validate);

        $obatId = $request->obatId;
        $jumlah = $request->jumlahSebenarnya;

        Obat::where('id', $obatId)->update(array('jumlah' => $jumlah));
      
        return redirect('/stokOpname')->with('success', 'Edit Stok Opname Berhasil!');
        
    }
    public function aktif(Request $request)
    {            
        $id = $request->id;
        $active = $request->active;

        $obat = Obat::find($id);
        $obat->active = $active;
        $obat->save();
        
        if ($active == 1) {
            return redirect('/stokOpname')->with('success', 'Obat Berhasil Diaktifkan');

        } else {
            return redirect('/stokOpname')->with('error', 'Obat Berhasil Dinon-aktifkan');

        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Obat::destroy($id);
        return redirect('/stokOpname')->with('success', 'Obat deleted successfully!');
    }
}

