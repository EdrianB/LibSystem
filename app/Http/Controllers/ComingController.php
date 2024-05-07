<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ComingController extends Controller
{
    public function soon(){
        return view('coming_soon');
    }
}
