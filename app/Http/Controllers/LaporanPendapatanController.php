<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use Illuminate\Http\Request;
use DB;

class LaporanPendapatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $nama = auth()->user()->nama;
        $dateYear = date('Y');
        $dateMonth = date('m');

        $pendapatan = Penjualan::select(DB::raw('MONTH(created_at) month'),DB::raw('sum(total) as total'))
        ->whereYear('created_at', '=', $dateYear)
        ->where('statusPembayaran','=', 1)
        ->orderBy('created_at', 'desc')
        ->groupBy('month')
        ->get();

        return view('laporan.laporanPendapatan.index',compact('pendapatan','user_id','nama','dateYear'))->with('i', (request()->input('page', 1) - 1) * 5);
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
