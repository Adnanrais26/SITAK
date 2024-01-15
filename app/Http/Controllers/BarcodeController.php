<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Obat;
use Picqer;

class BarcodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barcode = Obat::latest()->paginate(15);
        $barcode2 = Obat::select('*');
        $user_id = auth()->user()->id;
        $nama = auth()->user()->nama;

        
        return view('apotek.barcode.index',compact('barcode','barcode2','user_id','nama'))->with('i', (request()->input('page', 1) - 1) * 5);;
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
        
        $generatorHTML = new Picqer\Barcode\BarcodeGeneratorHTML();
        $barcode = $generatorHTML->getBarcode($id, $generatorHTML::TYPE_CODE_128);
    
        
        return view('apotek.barcode.barcode', compact('barcode','id'));

        // $generatorPNG = new Picqer\Barcode\BarcodeGeneratorPNG();
        // $image = $generatorPNG->getBarcode($id, $generatorPNG::TYPE_CODE_128);
    
        // Storage::put('barcodes/demo.png', $image);
        // Storage::disk('public')->put('barcodes/'+ $image, $image); //storage/app/public/img/qr-code/img-1557309130.png
    
        // return response($image)->header('Content-type','image/png');
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
