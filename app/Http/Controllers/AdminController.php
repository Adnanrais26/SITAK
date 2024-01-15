<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        $user_id = auth()->user()->id;
        $nama = auth()->user()->nama;
        

        return view('admin.index',compact('user_id','nama'));
    }
}
