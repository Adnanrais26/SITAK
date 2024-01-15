<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use Illuminate\Http\Request;

class LaporanPenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $nama = auth()->user()->nama;

        $penjualan = Penjualan::join('obats', 'obats.id', '=', 'penjualans.obatId')
        ->join('units', 'units.id', '=', 'obats.unitId')
        ->where('statusPembayaran','=', 1)
        ->get(['penjualans.*', 'obats.id as obatId','obats.obat', 'obats.jumlah as jumlahObat', 'units.unit']);
        
        return view('laporan.laporanPenjualan.index',compact('penjualan','user_id','nama'))->with('i', (request()->input('page', 1) - 1) * 5);
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
