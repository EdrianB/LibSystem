<?php
namespace App\Http\Controllers\Students;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StProfileController extends Controller
{
    public function index(){
        $student = Auth::guard('student')->user();
        return view('profiles.student', compact('student'));
    }
}
