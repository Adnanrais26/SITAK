<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class DaftarAkunController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $users = User::latest()->paginate(5);
        $roles = Role::latest()->paginate(15);
        $users = User::latest()->paginate(15);
        $user_id = auth()->user()->id;
        $nama = auth()->user()->nama;
        
        // return view('akun.daftarakun',compact('users'))->with('i', (request()->input('page', 1) - 1) * 5);;
        return view('akun.daftarakun',compact('roles','users','user_id','nama'))->with('i', (request()->input('page', 1) - 1) * 5);;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'username' => 'required|unique:users',
            'password' => 'required',
            'password' => 'required',
            'role_id'  => 'required',
        ]);
 
        $validatedData['password'] = Hash::make($validatedData['password']);
 
        User::create($validatedData);
        return redirect('/daftarakun')->with('success', 'Registration Succesfull! Please Login');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $users)
    {
        return view('users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $users)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
            $validatedData = $request->validate([
                'nama' => 'required|max:255',
                'username' => 'required|unique:users',
                'password' => 'required',
                'password' => 'required',
                'role_id'  => 'required',
            ]);
     
            $validatedData['password'] = Hash::make($validatedData['password']);
     
            User::whereId($id)->update($validatedData);
            return redirect('/daftarakun')->with('success', 'Edit Succesfull!');
        
    }
    public function aktif(Request $request)
    {            
        $id = $request->id;
        $active = $request->active;

        $user = User::find($id);
        $user->active = $active;
        $user->save();
        
        if ($active == 1) {
            return redirect('/daftarakun')->with('success', 'Akun Berhasil Diaktifkan');

        } else {
            return redirect('/daftarakun')->with('error', 'Akun Berhasil Dinon-aktifkan');

        }

    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect('/daftarakun')->with('success', 'User deleted successfully!');

        // if (){

        // }else {
        //     return redirect()->route('daftarakun.index')->with('error','User deleted error');

        // }
        // return redirect()->route('daftarakun.index')->with('error','User deleted error');
       
    }
}
