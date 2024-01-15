<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $id = "6";
        $id = auth()->user()->id;
        // $users = User::where('id', $id)->first();
        $users = User::join('roles', 'roles.id', '=', 'users.role_id')
        ->where('users.id', $id)
        ->get(['users.*','roles.role_name']);
        // return view('profile.index')->with('users', $users);
        // dd($users);
        $user_id = auth()->user()->id;
        $nama = auth()->user()->nama;
        

        return view('akun.profile.index', compact('users','user_id','nama'));
    
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
