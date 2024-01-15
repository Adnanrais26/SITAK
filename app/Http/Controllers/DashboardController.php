<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Penjualan;
use App\Models\Pengeluaran;
use Illuminate\Http\Request;
use DB;


class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $user_id = auth()->user()->id;
        $nama = auth()->user()->nama;
        $date = date('Y/m/d H:i:s');
        $dateYear = date('Y');
        $dateMonth = date('m');
        $jumlahProduk=Obat::sum('jumlah');
        // $jumlahProduk = Obat::whereYear('created_at', '=', $dateYear)
        // ->whereMonth('created_at', '=', $dateMonth)
        // ->sum('jumlah');
        
        // $penjualan=Penjualan::sum('jumlah');
        $dbPenjualan = Penjualan::select(DB::raw('sum(jumlah) as jumlah'),
        DB::raw('sum(total) as total'),
        DB::raw('sum(totalBeli) as totalBeli'),)
        ->whereYear('created_at', '=', $dateYear)
        ->whereMonth('created_at', '=', $dateMonth)
        ->first();
        
        $penjualan     = $dbPenjualan['jumlah'];
        $pemasukan      = $dbPenjualan['total'];
        $totalBeli  = $dbPenjualan['totalBeli'];
        $margin     = $pemasukan-$totalBeli;
        
        $pengeluaran = Pengeluaran::whereYear('created_at', '=', $dateYear)
        ->whereMonth('created_at', '=', $dateMonth)
        ->sum('jumlah');

        $keuntungan=$pemasukan-$pengeluaran;
        
        $grafikTerlaris=Penjualan::leftJoin('obats', 'obats.id', '=', 'penjualans.obatId')
        ->whereYear('penjualans.created_at', '=', $dateYear)
        ->whereMonth('penjualans.created_at', '=', $dateMonth)
        ->orderBy('penjualans.jumlah', 'asc')
        ->groupBy('penjualans.kodeProduk')
        ->get(['obats.obat as obat','penjualans.kodeProduk',DB::raw('sum(penjualans.jumlah) as jumlah')]);

        $stokBarang=Obat::select('obat','kodeProduk',DB::raw('sum(jumlah) as jumlah'))
        ->whereYear('created_at', '=', $dateYear)
        ->where('active', 1)
        ->orderBy('jumlah', 'asc')
        ->groupBy('kodeProduk')
        ->get();

        $pendapatan = Penjualan::select(DB::raw('MONTH(created_at) month'),DB::raw('sum(total) as total'))
        ->whereYear('created_at', '=', $dateYear)
        ->where('statusPembayaran','=', 1)
        ->orderBy('created_at', 'asc')
        ->groupBy('month')
        ->get();

        $pengeluaran2 = Pengeluaran::select(DB::raw('MONTH(created_at) month'),DB::raw('sum(jumlah) as total'))
        ->whereYear('created_at', '=', $dateYear)
        ->orderBy('created_at', 'asc')
        ->groupBy('month')
        ->get();

        return view('dashboard.index',compact('pengeluaran2','pendapatan','date','dateMonth','dateYear','stokBarang','grafikTerlaris','user_id','nama','jumlahProduk','penjualan','pemasukan','pengeluaran','keuntungan','margin'))->with('i', (request()->input('page', 1) - 1) * 5);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
