<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PemilikController extends Controller
{
    public function index() {
        $user_id = auth()->user()->id;
        $nama = auth()->user()->nama;
        
        return view('pemilik.index',compact('user_id','nama'));
    }
}
