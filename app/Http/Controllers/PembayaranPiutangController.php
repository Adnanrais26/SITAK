<?php

namespace App\Http\Controllers;

use App\Models\JenisPengeluaran;
use App\Models\Pengeluaran;
// use App\Models\PembayaranPiutang;
use Illuminate\Http\Request;

class PembayaranPiutangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $pengeluaranPiutangs = Pengeluaran::join('jenis_pengeluarans', 'jenis_pengeluarans.id', '=', 'pengeluarans.jenisPengeluaranId')
        ->where('pengeluarans.jenisPengeluaranId', '1')
        ->get(['pengeluarans.*', 'jenis_pengeluarans.jenisPengeluaran']);

        $jeniss = JenisPengeluaran::latest()->paginate(15);

        $user_id = auth()->user()->id;
        $nama = auth()->user()->nama;

        
        return view('transaksi.pembayaranPiutang.index',compact('pengeluaranPiutangs','jeniss','user_id','nama'))->with('i', (request()->input('page', 1) - 1) * 5);
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
    public function show(pembayaranPiutang $pembayaranPiutang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(pembayaranPiutang $pembayaranPiutang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, pembayaranPiutang $pembayaranPiutang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(pembayaranPiutang $pembayaranPiutang)
    {
        //
    }
}
