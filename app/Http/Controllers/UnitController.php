<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $unit = Unit::latest()->paginate(15);
        $user_id = auth()->user()->id;
        $nama = auth()->user()->nama;

        
        return view('gudang.unit.index',compact('unit','user_id','nama'))->with('i', (request()->input('page', 1) - 1) * 5);
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
        $unit = $request->validate([
            'unit' => 'required',
            'keterangan' => 'required',
        ]);
        
        Unit::create($unit);
        
        return redirect('/unit')->with('success', 'Tambah Unit Obat Berhasil!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Unit $unit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Unit $unit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $unit = $request->validate([
            'unit' => 'required',
            'keterangan' => 'required',
        ]);
        
        Unit::whereId($id)->update($unit);
        return redirect('/unit')->with('success', 'Edit Succesfull!');
    }
    public function aktif(Request $request)
    {            
        $id = $request->id;
        $active = $request->active;

        $united = Unit::find($id);
        $united->active = $active;
        $united->save();
        
        if ($active == 1) {
            return redirect('/unit')->with('success', 'Kategori Obat Berhasil Diaktifkan');

        } else {
            return redirect('/unit')->with('error', 'Kategori Obat Berhasil Dinon-aktifkan');

        }

    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Unit::destroy($id);
        return redirect('/unit')->with('success', 'unit Obat deleted successfully!');
    }
}
