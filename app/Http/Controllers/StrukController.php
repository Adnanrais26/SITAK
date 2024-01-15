<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Struk;
use App\Models\Penjualan;

use Illuminate\Http\Request;

class StrukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $user_id = auth()->user()->id;
        $nama = auth()->user()->nama;

        
        return view('transaksi.penjualan.struk',compact('user_id','nama'))->with('i', (request()->input('page', 1) - 1) * 5);;
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
        $user_id = auth()->user()->id;
        $nama = auth()->user()->nama;

        $struk = Penjualan::join('obats', 'obats.id', '=', 'penjualans.obatId')
        ->join('struks', 'struks.kodePenjualan','=','penjualans.kodePenjualan')
        ->join('units', 'units.id', '=', 'obats.unitId')
        ->where('struks.kodePenjualan','=', $id)
        ->where('penjualans.statusPembayaran','=', 0)
        ->get(['struks.kodeStruk','struks.total','struks.tunai','penjualans.*', 'obats.id as obatId','obats.obat', 'obats.jumlah as jumlahObat', 'units.unit']);

        

        return view('transaksi.penjualan.struk',compact('user_id','nama','struk'))->with('i', (request()->input('page', 1) - 1) * 5);;
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
