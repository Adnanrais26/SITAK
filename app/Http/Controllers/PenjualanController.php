<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\Resep;
use App\Models\Obat;
use App\Models\Struk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $penjualan = Penjualan::latest()->paginate(15);statusPembayaran//->where('statusPembayaran','=', 0)
        
        $penjualan = Penjualan::select('*')->get()->paginate(15);
        $user_id = auth()->user()->id;
        $nama = auth()->user()->nama;
        $idproduk = 0;
        $active = 0;
        $produk = Obat::latest()->paginate(15);

        return view('transaksi.penjualan.index',compact('penjualan','user_id','nama','produk','idproduk'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function search(Request $request){
        

        $produk = Obat::latest()->paginate(15);
        $search = $request->input('search');
        $obat = Obat::where('kodeProduk', 'like', "$search%")
            ->orWhere('obat', 'like', "$search%")
            ->get();
        
        // $obat = Obat::where('active', '=', 1)
        //     ->orWhere(function(Builder $query) {
        //         $query->where('kodeProduk', 'like', "$search%")
        //               ->where('obat', 'like', "$search%");
        //     })
        //     ->get();
        
        $obat = Obat::where('kodeProduk', 'like', "$search%")
            ->orWhere('obat', 'like', "$search%")
            ->get();

        return view('transaksi.penjualan.result')->with('obat', $obat);

    }
    public function store(Request $request)
    {
        $nama = $request->namaPembeli;
        $noTelp = $request->noTelp;
        $kodePenjualan = 1;

        if ($nama == "" || $noTelp == "") {
            //masuin data ke tabel degan status 0
        $obatId = $request->obatId;
        $statusPembayaran = 0;
        $hargaJual= $request->hargaJual;
        $hargaBeli= $request->hargaBeli;
        $jumlah = $request->jumlah;
        $total = $hargaJual * $jumlah;
        $totalBeli = $hargaBeli * $jumlah;

        // dd($hargajual);
        $obat = $request->validate([
            'jumlah' => 'required',
            'obatId' => 'required',
            'kodeProduk' => 'required',
            'unitId' => 'required',
            'hargaJual' => 'required',
            'hargaBeli' => 'required',
        ]);

        Penjualan::create($obat + ['statusPembayaran' => $statusPembayaran, 'total' => $total,'totalBeli' => $totalBeli, 'kodePenjualan' => DB::raw("kodePenjualan + $kodePenjualan")]);
        
        Obat::where('id', $obatId)
        ->update(['jumlah' => DB::raw("jumlah - $jumlah")]);

        return redirect('penjualan/0');
        } else {
            //masuin data ke tabel degan status 0
        $obatId = $request->obatId;
        $statusPembayaran = 0;
        $hargaJual= $request->hargaJual;
        $hargaBeli= $request->hargaBeli;
        $jumlah = $request->jumlah;
        $total = $hargaJual * $jumlah;
        $totalBeli = $hargaBeli * $jumlah;
        

        $obat = $request->validate([
            'namaPembeli' => 'required',
            'noTelp' => 'required',
            'jumlah' => 'required',
            'obatId' => 'required',
            'kodeProduk' => 'required',
            'unitId' => 'required',
            'hargaJual' => 'required',
            'hargaBeli' => 'required',
        ]);

        Penjualan::create($obat + ['statusPembayaran' => $statusPembayaran, 'total' => $total, 'totalBeli' => $totalBeli, 'kodePenjualan' => DB::raw("kodePenjualan + $kodePenjualan")]);
        
        Obat::where('id', $obatId)
        ->update(['jumlah' => DB::raw("jumlah - $jumlah")]);
        

        // $fileResep = $request->$fileResep;

        // $path = $request->file('fileResep')->getRealPath();

        // $logo = file_get_contents($path);
        // $base64 = base64_encode($logo);

        // if (empty($base64)) {
        //     return redirect('penjualan/0');
            
        // }else {
        //     $obat = $request->validate([
        //         'jumlah' => 'required',
        //         'obatId' => 'required',
        //         'kodeProduk' => 'required',
        //         'unitId' => 'required',
        //         'hargaJual' => 'required',
        //     ]);
    
        //     Resep::create($resep + ['fileResep' => $base64, ]);
        // }
        
        

        return redirect('penjualan/0');
        }
        
    }
    public function struk(Request $request)
    {
        $kodeStruk= $request->kodeStruk;
        $kodePenjualan= $request->kodePenjualan;
        $total= $request->total;
        $tunai= $request->tunai;
        $userId= $request->userId;


        $struk = $request->validate([
            'kodeStruk' => 'required',
            'kodePenjualan' => 'required',
            'total' => 'required',
            'tunai' => 'required',
            'userId' => 'required',
        ]);

        Struk::create($struk);

        Penjualan::where('kodePenjualan', $kodePenjualan)->update(['statusPembayaran' => 1]);
        
        return redirect('penjualan/0');
        // return view('transaksi.penjualan.struk');
        // return redirect('struk/'.$kodeStruk);

    }
    /**
     * Display the specified resource.
     */
    public function show($id)
    { 
        // echo $id;
        // $penjualan = Penjualan::select('*')->where('statusPembayaran','=', 0)->get();
        $active = 2;

        $nama = auth()->user()->nama;
        $user_id = auth()->user()->id;
        $kodeStruk = date('YmdHis');
        $date = date('Y-m-d H:i:s');

        $statusPembayaranTotal = Penjualan::where('statusPembayaran', '=', 0)->get();
        $bayar = $statusPembayaranTotal->sum('total');
        // $hasil_rupiah = "Rp " . number_format($bayar,2,',','.');
        $hasil_rupiah = $bayar;


        $penjualanih = Penjualan::select('*')->where('statusPembayaran','=', 0)->first();
        if ($penjualanih == NULL) {
            $namaPembeli = "";
            $noTelp = "";
            // dd($noTelp);
        } else {
            $namaPembeli = $penjualanih['namaPembeli'];
            $noTelp = $penjualanih['noTelp'];
            // dd($noTelp);
        }
        $penjualan3 = Penjualan::join('obats', 'obats.id', '=', 'penjualans.obatId')
        ->join('units', 'units.id', '=', 'obats.unitId')
        ->where('statusPembayaran','=', 0)
        ->get(['penjualans.*', 'obats.id as obatId','obats.obat', 'obats.jumlah as jumlahObat', 'units.unit']);

        $penjualan2 = Penjualan::join('obats', 'obats.id', '=', 'penjualans.obatId')
        ->join('units', 'units.id', '=', 'obats.unitId')
        ->where('statusPembayaran','=', 0)
        ->get(['penjualans.*', 'obats.id as obatId','obats.obat', 'obats.jumlah as jumlahObat', 'units.unit']);

        $penjualan = Penjualan::join('obats', 'obats.id', '=', 'penjualans.obatId')
        ->join('units', 'units.id', '=', 'obats.unitId')
        ->where('statusPembayaran','=', 0)
        ->get(['penjualans.*', 'obats.id as obatId','obats.obat', 'obats.jumlah as jumlahObat', 'units.unit']);

        $user_id = auth()->user()->id;
        $idproduk = $id;
        $nama = auth()->user()->nama;
        $obat = Obat::select('obats.*','obats.id as idObat','units.unit')->join('units', 'units.id', '=', 'obats.unitId')->find($id);
        // $obat = Obat::join('units', 'units.id', '=', 'obats.unitId')
        // ->where('obats.id','=', $id)
        // ->get();

        return view('transaksi.penjualan.index',compact('kodeStruk','date', 'hasil_rupiah','namaPembeli','noTelp','penjualan','penjualan2','penjualan3','user_id','nama','obat','idproduk'))->with('i', (request()->input('page', 1) - 1) * 5);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penjualan $penjualan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Penjualan $penjualan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        Penjualan::destroy($id);

        $jumlah = $request->jumlah;
        $obatId = $request->obatId;

        Obat::where('id', $obatId)
        ->update(['jumlah' => DB::raw("jumlah + $jumlah")]);

        return redirect('penjualan/0')->with('success', 'Produk deleted successfully!');
    }

}
