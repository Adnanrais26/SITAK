<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\Obat;
use App\Models\Retur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ReturController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $retur = Retur::latest()->paginate(15);
        $user_id = auth()->user()->id;
        $nama = auth()->user()->nama;
        $idproduk = 0;
        
        return view('apotek.retur.index',compact('idproduk','retur','user_id','nama'))->with('i', (request()->input('page', 1) - 1) * 5);;
    }
    public function search(Request $request){
        

        $produk = Obat::latest()->paginate(15);
        $search = $request->input('search');
        $obat = Obat::where('kodeProduk', 'like', "$search%")
            ->orWhere('obat', 'like', "$search%")
            ->get();

        
        $obat = Obat::where('kodeProduk', 'like', "$search%")
            ->orWhere('obat', 'like', "$search%")
            ->get();

        return view('apotek.retur.result')->with('obat', $obat);

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
        $obatId = $request->obatId;
        $jumlah = $request->jumlah;
        // dd($hargajual);
        $obat = $request->validate([
            'obatId'=> 'required',
            'kodeProduk'=> 'required',
            'jumlah'=> 'required',
            'unitId'=> 'required',
            'distributor'=> 'required',
            'keterangan'=> 'required',
        ]);

        Retur::create($obat);
        
        Obat::where('id', $obatId)
        ->update(['jumlah' => DB::raw("jumlah - $jumlah")]);

        return redirect('retur/0');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    { 
        // echo $id;
        // $penjualan = Penjualan::select('*')->where('statusPembayaran','=', 0)->get();
        // $retur = Retur::latest()->paginate(15);

        $retur = Retur::join('obats', 'obats.id', '=', 'returs.obatId')
        ->join('units', 'units.id', '=', 'obats.unitId')
        ->get(['returs.*','obats.obat', 'obats.jumlah as jumlahObat', 'units.unit']);

        $nama = auth()->user()->nama;
        $user_id = auth()->user()->id;
        $kodeStruk = date('YmdHis');
        $date = date('Y-m-d H:i:s');

        $statusPembayaranTotal = Penjualan::where('statusPembayaran', '=', 0)->get();
        $bayar = $statusPembayaranTotal->sum('total');
        // $hasil_rupiah = "Rp " . number_format($bayar,2,',','.');
        $hasil_rupiah = $bayar;


        

        $user_id = auth()->user()->id;
        $idproduk = $id;
        $nama = auth()->user()->nama;
        $obat = Obat::find($id);
        

        return view('apotek.retur.index',compact('retur','kodeStruk','date', 'hasil_rupiah','user_id','nama','obat','idproduk'))->with('i', (request()->input('page', 1) - 1) * 5);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Retur $kategoriObat)
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
        
        Retur::whereId($id)->update($kategori);
        return redirect('/retur')->with('success', 'Edit Succesfull!');

    }
    public function aktif(Request $request)
    {            
        $id = $request->id;
        $active = $request->active;

        $user = Retur::find($id);
        $user->active = $active;
        $user->save();
        
        if ($active == 1) {
            return redirect('/retur')->with('success', 'Kategori Obat Berhasil Diaktifkan');

        } else {
            return redirect('/retur')->with('error', 'Kategori Obat Berhasil Dinon-aktifkan');

        }

    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        Retur::destroy($id);
        
        $jumlah = $request->jumlah;
        $obatId = $request->obatId;

        Obat::where('id', $obatId)
        ->update(['jumlah' => DB::raw("jumlah + $jumlah")]);

        return redirect('/retur/0')->with('success', 'Retur Obat deleted successfully!');

    }
    
}
