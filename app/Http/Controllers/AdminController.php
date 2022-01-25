<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function Admin(){
        return view('index');
    }
}


// php artisan make:controller Syndicat
//         $users = DB::table('users')->where('')->get();
