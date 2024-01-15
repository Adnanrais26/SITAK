<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class GantiPasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $nama = auth()->user()->nama;
        return view('akun.gantipassword.index', compact('user_id','nama'));
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
        $password= $request->password;
        $repassword= $request->repassword;

        if ( $password ==  $repassword) {
            $validatedData = $request->validate([
                'password' => 'required',
            ]);
     
            $validatedData['password'] = Hash::make($validatedData['password']);
     
            User::whereId($id)->update($validatedData);
            return redirect('gantipassword')->with('success', 'Ganti Password Berhasil!');
        } else {
            return redirect('gantipassword')->with('error', 'Password Tidak Sama!');

        }
        
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
